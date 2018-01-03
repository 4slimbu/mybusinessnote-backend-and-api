<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * API Register, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
        ];


        $input = $request->only('first_name', 'last_name', 'role_id', 'email', 'phone_number', 'password');
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error], 422);
        }

        //save data
        $input['role_id'] = 2; //role: customer
        $input['verified'] = 1; //email verification not required for now
        $user = User::create($input);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1
        ];

        try {
            // attempt to verify the credentials and create a token for the user
            $customClaims = [
                "user" => $user
            ];

            if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    /**
     * API Update User Info
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
        ];


        $input = $request->only('first_name', 'last_name', 'phone_number', 'password');
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error], 422);
        }

        //save data
        $user->fill($input)->save();


        // all good so return the user
        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

    /**
     * API Check If User Exists
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param User $user
     */
    public function checkIfUserExists(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];


        $input = $request->only('email');
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error], 422);
        }

        //check user
        $user = User::select('id')->where('email', $request->get('email'))->first();

        //return response
        return response()->json([
            'user' => ($user) ? true : false
        ]);
    }


    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $input = $request->only('email', 'password');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1
        ];

        try {
            // attempt to verify the credentials and create a token for the user
            $authUser = User::where("email", $request->email)
                ->where("verified", 1)
                ->first()
                ->toArray();

            $customClaims = [
                "user" => $authUser
            ];

            if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true, 'token' => $token]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to re-login to get a new token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {

        try {
            JWTAuth::invalidate($request->bearerToken());
            return response()->json(['success' => true]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }


    public function getBusinessStatus() {
        $business = null;

        //get user from token
        if (JWTAuth::getToken()) {
            $decodedToken = JWTAuth::decode(JWTAuth::getToken())->toArray();

            if ($decodedToken) {
                $business = Business::where("user_id", $decodedToken['user']['id'])->first();
            }
        }

        //if no business, return with generic data
        if (!$business) {
            $data = [
                "levels" => $this->getLevels($business),
            ];

            return response()->json($data, 200);
        };

        // else return with business data
        $data = [
            "business_id" => $business->id,
            "user_id" => $business->user->id,
            "business_category_id" => $business->businessCategory->id,
            "business_name" => $business->business_name,
            "levels" => $this->getLevels($business),
        ];

        return response()->json($data, 200);
    }

    private function getLevels($business)
    {
        //get data
        $data = [];
        $levels = Level::select('id', 'name', 'slug', 'icon')->orderBy('menu_order')->get();

        //get levels data and set completed_percent to 0
        foreach ($levels as $level) {

            $arr = $level->toArray();
            $arr["completed_percent"] = 0;
            $arr["total_sections"] = count($level->sections);
            //set completed_percent to actual percent on touched levels
            if (isset($business->levels)) {
                foreach ($business->levels as $b_level) {
                    if ($b_level->id == $level->id) {
                        $arr["completed_percent"] = $b_level->pivot->completed_percent;
                    }
                }
            }

            $sectionData = $this->getSections($business, $level);

            $arr["total_completed_sections"] = $sectionData['total_completed_sections'];
            $arr["sections"] = $sectionData['sections'];

            array_push($data, $arr);
        }



        return $data;
    }

    private function getSections($business, $level)
    {

        //get data
        $data = [];
        $sections = Section::select('id', 'level_id', 'slug', 'name')->where("level_id", $level->id)->get();
        $total_completed_sections = 0;

        //get sections data and set completed_percent to 0
        //get levels data and set completed_percent to 0
        foreach ($sections as $section) {
            $arr = $section->toArray();
            $arr["completed_percent"] = 0;

            //set completed_percent to actual percent on touched sections
            if (isset($business->sections)) {
                foreach ($business->sections as $b_section) {
                    if ($b_section->id == $section->id) {
                        $arr["completed_percent"] = $b_section->pivot->completed_percent;
                        if ($arr["completed_percent"] === 100) {
                            $total_completed_sections +=1;
                        }
                    }

                }
            }

            array_push($data, $arr);
        }


        return [
            "sections" => $data,
            "total_completed_sections" => $total_completed_sections
        ];
    }

}
