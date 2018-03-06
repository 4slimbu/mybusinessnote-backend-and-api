<?php

namespace App\Http\Controllers\Api;

use App\Events\ForgotPasswordEvent;
use App\Events\UnVerifiedUserEvent;
use App\Exceptions\InvalidRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthValidation\LoginRequest;
use App\Http\Requests\Api\AuthValidation\RegisterUserRequest;
use App\Http\Requests\Api\AuthValidation\UpdateUserRequest;
use App\Http\Resources\Api\UserResource;
use App\Libraries\ResponseLibrary;
use App\Models\User;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
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

    public function getUser()
    {
        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'user' => new UserResource($this->getAuthUser())
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authenticate($request);

        return ResponseLibrary::success([
            'successCode' => 'LOGIN_SUCCESS', 'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate($request->bearerToken());

        return ResponseLibrary::success([
            'successCode' => 'LOGOUT_SUCCESS'
        ], 200);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userRegister($request);

        return ResponseLibrary::success([
            'successCode' => 'USER_REGISTERED',
            'token' => $this->getJwtTokenFromUser($user)
        ], 201);
    }

    public function sendForgotPasswordEmail(Request $request)
    {
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

    public function sendVerificationEmail()
    {
        $authUser = $this->getAuthUser();

        $authUser->fill([
            'email_verification_token' => md5(uniqid(rand(), true)),
            'email_verification_token_expiry_date' => Carbon::now()->addDay(1)
        ])->save();

        event(new UnVerifiedUserEvent($authUser));

        return ResponseLibrary::success([
            'successCode' => 'VERIFICATION_EMAIL_SENT'
        ], 200);
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

        if (!$authUser) {
            throw new InvalidRequestException();
        }

        $data = [
            'verified' => 1,
            'email_verification_token' => null,
            'email_verification_token_expiry_date' => null
        ];

        $authUser->fill($data)->save()->refresh();

        return ResponseLibrary::success([
            'successCode' => 'VERIFIED',
            'token' => $this->getJwtTokenFromUser($authUser)
        ], 200);
    }

}
