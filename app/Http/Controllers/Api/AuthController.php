<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

}
