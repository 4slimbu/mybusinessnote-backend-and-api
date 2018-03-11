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

    /**
     * Check if user with provided email exist in the database
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkIfUserExists(Request $request)
    {
        //check user
        $user = User::select('id')->where('email', $request->get('email'))->first();

        return ResponseLibrary::success([
            'successCode' => 'USER_EXIST_CHECK',
            'isPresent' => !!$user
        ], 200);
    }

    /**
     * Get the current auth user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        return ResponseLibrary::success([
            'successCode' => 'FETCHED',
            'user' => new UserResource($this->getAuthUserOrFail())
        ], 200);
    }

    /**
     * Login user
     *
     * Authenticate user and generate JWT token
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidCredentialException
     */
    public function login(LoginRequest $request)
    {
        $token = $this->authenticate($request);

        return ResponseLibrary::success([
            'successCode' => 'LOGIN_SUCCESS', 'token' => $token
        ], 200);
    }

    /**
     * Logout user
     *
     * Invalidate JWTAuth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate($request->bearerToken());

        return ResponseLibrary::success([
            'successCode' => 'LOGOUT_SUCCESS'
        ], 200);
    }

    /**
     * Register user
     *
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(RegisterUserRequest $request)
    {
        $user = $this->registerUser($request);

        return ResponseLibrary::success([
            'successCode' => 'USER_REGISTERED',
            'token' => $this->getTokenFromUser($user)
        ], 201);
    }

    /**
     * Generate and save forgot password token and trigger ForgotPasswordEvent
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Generate and save email verification token and trigger UnVerifiedUserEvent
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendVerificationEmail()
    {
        $authUser = $this->getAuthUserOrFail();

        $authUser->fill([
            'email_verification_token' => md5(uniqid(rand(), true)),
            'email_verification_token_expiry_date' => Carbon::now()->addDay(1)
        ])->save();

        event(new UnVerifiedUserEvent($authUser));

        return ResponseLibrary::success([
            'successCode' => 'VERIFICATION_EMAIL_SENT'
        ], 200);
    }

    /**
     * Update general fields of user
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $inputs = $request->only('first_name', 'last_name', 'phone_number');

        $user = $this->getAuthUserOrFail();

        $user->fill($inputs)->save();

        $token = $this->getTokenFromUser($user);

        return ResponseLibrary::success([
            'successCode' => 'SAVED',
            'token' => $token
        ], 200);
    }

    /**
     * Update user password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidRequestException
     */
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

    /**
     * Verify if the email verification token is valid or not
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidRequestException
     */
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
            'token' => $this->getTokenFromUser($authUser)
        ], 200);
    }

}
