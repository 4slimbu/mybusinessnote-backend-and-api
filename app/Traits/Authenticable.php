<?php
namespace App\Traits;

use App\Events\UserRegistered;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Authenticable
{
    /**
     * Get user using jwt-token
     * @return mixed
     */
    private function getAuthUser()
    {
        if (JWTAuth::getToken()) {
            $decodedToken = JWTAuth::decode(JWTAuth::getToken());

            if ($decodedToken) {
                return  User::where('id', $decodedToken['user']['id'])->firstOrFail();
            }
        }
        throw new ModelNotFoundException();
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
        $input = $request->only('first_name', 'last_name', 'role_id', 'email', 'phone_number', 'password');

        //save data
        $input['role_id'] = 2; //role: customer
        $input['email_verification_token'] = md5(uniqid(rand(), true));
        $input['email_verification_token_expiry_date'] = Carbon::now()->addDay(1);
        $user = User::create($input)->refresh();

        //fire events
        event(new UserRegistered(User::find($user->id)));

        return $user;
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
                "user" => new UserResource($user)
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