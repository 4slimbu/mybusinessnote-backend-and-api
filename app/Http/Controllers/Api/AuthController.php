<?php

namespace App\Http\Controllers\Api;

use App\Events\ForgotPasswordEvent;
use App\Events\LevelOneCompleteEvent;
use App\Events\UnVerifiedUserEvent;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use BusinessOptionable, Authenticable;
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
        $user = User::create($input)->refresh();

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
            'siwps' => 'required|email',
            'sdlkw' => 'required',
        ];

        $input = $request->only('siwps', 'sdlkw');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $credentials = [
            'email' => $request->siwps,
            'password' => $request->sdlkw,
            //'verified' => 1 //TODO: enable this after fixing CORS issue
        ];
        try {
            // attempt to verify the credentials and create a token for the user
            $authUser = User::where("email", $request->siwps)
                //->where("verified", 1) //TODO: enable this after fixing CORS issue
                ->first();

            $customClaims = [
                "user" => $authUser
            ];
            if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
                return response()->json(['success' => false, 'error' => ['form' => 'Invalid Credentials.']], 401);
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

    public function sendForgotPasswordEmail(Request $request) {
        try {
            $user = User::where('email', $request->get('email'))->first();
            if ($user) {
                $user->fill([
                    'forgot_password_token' => md5(uniqid(rand(), true)),
                    'forgot_password_token_expiry_date' => Carbon::now()->addDay(1)
                ])->save();

                event(new ForgotPasswordEvent($user));

                return response()->json(['success' => true, 'message' => 'forgot_password_email_sent'], 200);
            }
            return response()->json(['success' => false, 'error' => 'send_forgot_password_email_failed'], 400);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->json(['success' => false, 'error' => 'send_forgot_password_email_failed'], 500);
        }

    }

    /**
     * Update User Password
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $authUser = User::where('forgot_password_token', $request->get('forgot_password_token'))
            ->where('forgot_password_token_expiry_date', '>', Carbon::now())
            ->first();

        if ($authUser) {
            try {
                //save data
                $data = [
                    'password' => $request->get('password'),
                    'forgot_password_token' => null,
                    'forgot_password_token_expiry_date' => null
                ];
                $authUser->fill($data)->save();

                $authUser->refresh();

                $customClaims = [
                    "user" => $authUser
                ];
                if (! $token = JWTAuth::fromUser($authUser, $customClaims)) {
                    return response()->json(['success' => false, 'error' => 'unable_to_create_token'], 500);
                }
            } catch (\Exception $e) {
                // something went wrong whilst attempting to encode the token
                return response()->json(['success' => false, 'error' => 'update_password_failed'], 500);
            }
            // all good so return the token
            return response()->json(['success' => true, 'token' => $token]);
        }

        // failed response
        return response()->json(['success' => false, 'error' => 'update_password_failed'], 400);
    }

    /**
     * Send Verification Email
     */
    public function sendVerificationEmail() {
        try {
            if ($authUser = $this->getAuthUser()) {
                $authUser->fill([
                    'email_verification_token' => md5(uniqid(rand(), true)),
                    'email_verification_token_expiry_date' => Carbon::now()->addDay(1)
                ])->save();

                event(new UnVerifiedUserEvent($authUser));

                return response()->json(['success' => true, 'message' => 'verification_email_sent'], 200);
            }
            return response()->json(['success' => false, 'error' => 'authentication_failed'], 401);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => 'send_verification_email_failed'], 500);
        }
    }

    /**
     * Verify Email
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmail(Request $request)
    {
        $authUser = User::where('email_verification_token', $request->get('email_verification_token'))
            ->where('email_verification_token_expiry_date', '>', Carbon::now())
            ->first();

        if ($authUser) {
            try {
                //save data
                $authUser->fill([
                    'verified' => 1,
                    'email_verification_token' => null,
                    'email_verification_token_expiry_date' => null
                ])->save();

                $customClaims = [
                    "user" => $authUser
                ];
                if (! $token = JWTAuth::fromUser($authUser, $customClaims)) {
                    return response()->json(['success' => false, 'error' => ['form' => 'Invalid Credentials.']], 401);
                }
            } catch (\Exception $e) {
                // something went wrong whilst attempting to encode the token
                return response()->json(['success' => false, 'error' => 'verification_failed'], 500);
            }
            // all good so return the token
            return response()->json(['success' => true, 'token' => $token]);
        }

        // un-authenticated user
        return response()->json(['success' => false, 'error' => 'verification_failed'], 401);
    }


    public function getBusinessStatus() {
        $business = null;

        //get user from token
        if (JWTAuth::getToken()) {
            $decodedToken = JWTAuth::decode(JWTAuth::getToken());

            if ($decodedToken) {
                $business = Business::with("user")->where("user_id", $decodedToken['user']['id'])->first();
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
            "first_name" => $business->user->first_name,
            "last_name" => $business->user->last_name,
            "email" => $business->user->email,
            "phone_number" => $business->user->phone_number,
            "history" => json_decode($business->user->history),
            "business_category_id" => $business->businessCategory->id,
            "sell_goods" => (bool) $business->sell_goods,
            "business_name" => $business->business_name,
            "website" => $business->website,
            "abn" => ($business->abn) ? $business->abn : '',
            "levels" => $this->getLevels($business),
        ];

        return response()->json($data, 200);
    }

    private function getLevels($business)
    {
        //get data
        $data = [];
        $levels = Level::all();

        //get levels data and set completed_percent to 0
        foreach ($levels as $level) {

            $arr = $level->toArray();
            $arr["completed_percent"] = 0;
            $arr["total_sections"] = count($level->sections);
            $arr["level_first_bo"] = BusinessOption::where('level_id', $level->id)->first();;
            $arr["level_last_bo"] = BusinessOption::where('level_id', $level->id)->orderBy('id', 'desc')->first();
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
        $sections = Section::where("level_id", $level->id)->get();
        $total_completed_sections = 0;

        //get sections data and set completed_percent to 0
        //get levels data and set completed_percent to 0
        foreach ($sections as $section) {
            $arr = $section->toArray();
            $arr["red_icon"] = asset('images/sections/' . $section->icon );
            $arr["white_icon"] = asset('images/sections/' . $section->icon );
            $arr["completed_percent"] = 0;
            $arr["section_first_bo"] = BusinessOption::where('level_id', $level->id)
                ->where('section_id', $section->id)->first();
            $arr["section_last_bo"] = BusinessOption::where('level_id', $level->id)
                ->where('section_id', $section->id)->orderBy('id', 'desc')->first();

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
