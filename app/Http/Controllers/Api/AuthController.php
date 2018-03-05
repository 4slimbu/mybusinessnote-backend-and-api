<?php

namespace App\Http\Controllers\Api;

use App\Events\ForgotPasswordEvent;
use App\Events\UnVerifiedUserEvent;
use App\Exceptions\InvalidCredentialException;
use App\Exceptions\InvalidRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthValidation\LoginRequest;
use App\Http\Requests\Api\AuthValidation\RegisterUserRequest;
use App\Http\Requests\Api\AuthValidation\UpdateUserRequest;
use App\Http\Resources\Api\UserResource;
use App\Libraries\ResponseLibrary;
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

    public function checkIfUserExists(Request $request)
    {
        //check user
        $user = User::select('id')->where('email', $request->get('email'))->first();

        return ResponseLibrary::success([
            'successCode' => 'USER_EXIST_CHECK',
            'isPresent' => !!$user
        ], 200);
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

    public function getUser()
    {
        return new UserResource($this->getAuthUser());
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // attempt to verify the credentials and create a token for the user
        $authUser = User::where("email", $request->email)
            ->first();

        $customClaims = [
            "user" => new UserResource($authUser)
        ];

        if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
            throw new InvalidCredentialException();
        }
        // all good so return the token
        return ResponseLibrary::success(['successCode' => 'LOGIN_SUCCESS', 'token' => $token], 200);
    }

    public function logout(Request $request) {
        JWTAuth::invalidate($request->bearerToken());

        return ResponseLibrary::success(['successCode' => 'LOGOUT_SUCCESS'], 200);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userRegister($request);

        return ResponseLibrary::success([
            'successCode' => 'USER_REGISTERED',
            'token' => $this->getJwtTokenFromUser($user)
        ], 201);
    }

    public function sendForgotPasswordEmail(Request $request) {
        $user = User::where('email', $request->get('email'))->firstOrFail();

        $user->fill([
            'forgot_password_token' => md5(uniqid(rand(), true)),
            'forgot_password_token_expiry_date' => Carbon::now()->addDay(1)
        ])->save();

        event(new ForgotPasswordEvent($user));

        return ResponseLibrary::success([
                'successCode' => 'FORGOT_EMAIL_SENT',
                'message' => 'Forgot password email sent'
            ], 200);

    }

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

    public function update(UpdateUserRequest $request)
    {
        $inputs = $request->only('first_name', 'last_name', 'phone_number');

        $user = $this->getAuthUser();

        $user->fill($inputs)->save();

        $token = $this->getJwtTokenFromUser($user);

        return ResponseLibrary::success([
            'successCode' => 'SAVED',
            'token' => $token
        ], 200);
    }

    public function updatePassword(Request $request)
    {
        $authUser = User::where('forgot_password_token', $request->get('forgot_password_token'))
            ->where('forgot_password_token_expiry_date', '>', Carbon::now())
            ->first();

        if (!$authUser) {
            throw new InvalidRequestException();
        }

        //save data
        $data = [
            'password' => $request->get('password'),
            'forgot_password_token' => null,
            'forgot_password_token_expiry_date' => null
        ];

        $authUser->fill($data)->save();

        return ResponseLibrary::success(
            [
                'successCode' => 'PASSWORD_UPDATED',
                'message' => 'Updated Password successfully'
            ], 200
        );

    }

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
