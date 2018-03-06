<?php
namespace App\Traits;

use App\Events\UserRegistered;
use App\Http\Resources\Api\UserResource;
use App\Models\BusinessBusinessOption;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
     * Register Api user
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
        event(new UserRegistered($user));

        return $user;
    }

    /**
     * Generate Jwt Token from given user instance
     *
     * @param User $user
     * @return bool
     */
    public function getJwtTokenFromUser(User $user)
    {
        return JWTAuth::fromUser($user, $this->getCustomClaims());
    }

    /**
     * Authenticate user and return token
     *
     * @param Request $request
     * @return mixed
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $authUser = User::where("email", $request->get('email'))->firstOrFail();

        return JWTAuth::attempt($credentials, $this->getCustomClaims($authUser));
    }

    private function getCustomClaims(User $user)
    {
        return [
            "user" => new UserResource($user),
            "scope" => $this->getScope($user)
        ];
    }

    private function getScope(User $user)
    {
        $businessOptionScope = BusinessBusinessOption::where('business_id', $user->business->id)
            ->where('status', '!=', 'locked')->select('business_option_id')->pluck('business_option_id')->toArray();

        return [
            "businessOption" => $businessOptionScope
        ];
    }

}