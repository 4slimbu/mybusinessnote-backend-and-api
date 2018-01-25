<?php
namespace App\Traits;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Authenticable
{
    private function getAuthUser()
    {
        //get user from token
        try {
            if (JWTAuth::getToken()) {
                $decodedToken = JWTAuth::decode(JWTAuth::getToken());

                if ($decodedToken) {
                    return User::where('id', $decodedToken['user']['id'])->first();
                }
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * API Register, on success return JWT Auth token
     *
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     * @throws Exception
     */
    private function userRegister(Request $request)
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
            return response()->json(['error_code'=> 'validation_error', 'error'=> $error], 422);
        }

        try {
            //save data
            $input['role_id'] = 2; //role: customer
            $input['verified'] = 1; //email verification not required for now
            $user = User::create($input);

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'verified' => 1
            ];

            // attempt to verify the credentials and create a token for the user
            $customClaims = [
                "user" => $user
            ];

            if (! $token = JWTAuth::attempt($credentials, $customClaims)) {
                throw new \Exception('invalid_credentials', 401);
            }
        } catch (\Exception $e) {
            // something went wrong whilst attempting to encode the token
            throw new \Exception('token_error', 500);
        }

        // all good so return the token
        return [
            'token' => $token,
            'user' => $user
        ];
    }
}