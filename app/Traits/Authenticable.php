<?php
namespace App\Traits;

use App\Events\UserRegistered;
use App\Http\Requests\Api\UserValidation\CreateFormValidation;
use App\Models\User;
use Carbon\Carbon;
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
     * @param CreateFormValidation $request
     * @return array|\Illuminate\Http\JsonResponse
     * @throws Exception
     */
    private function userRegister(CreateFormValidation $request)
    {
        try {
            //save data
            $input['role_id'] = 2; //role: customer
            $input['history'] = json_encode([
                'last_visited' => 'business_option?level=getting-started&section=your-business-details'
            ]);
            $input['email_verification_token'] = md5(uniqid(rand(), true));
            $input['email_verification_token_expiry_date'] = Carbon::now()->addDay(1);
            $user = User::create($input)->refresh();

            //fire events
            //$user won't return all fields so need to query again
            event(new UserRegistered(User::find($user->id)));

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                //'verified' => 1 //TODO: enable this after fixing CORS issue
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

    /**
     * Generate Jwt Token from given user
     *
     * @param User $user
     * @return bool
     */
    public function getJwtTokenFromUser(User $user)
    {
        try {
            $customClaims = [
                "user" => $user
            ];
            if (! $token = JWTAuth::fromUser($user, $customClaims)) {
                return false;
            }

            return $token;
        } catch (JWTException $e) {
            return false;
        }
    }
}