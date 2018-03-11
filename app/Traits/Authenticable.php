<?php
namespace App\Traits;

use App\Events\UserRegistered;
use App\Exceptions\InvalidCredentialException;
use App\Http\Resources\Api\UserResource;
use App\Models\BusinessOption;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Authenticable
{
    /**
     * Get auth user using token
     *
     * @return user|null
     */
    private function getAuthUser()
    {
        try {
            return $this->getAuthUserOrFail();
        } catch (\Exception $exception) {
        }

        return null;
    }

    /**
     * Get auth user using token or fail
     *
     * @return mixed
     */
    public function getAuthUserOrFail()
    {
        if (JWTAuth::getToken()) {
            $decodedToken = JWTAuth::decode(JWTAuth::getToken());

            if ($decodedToken) {
                return User::where('id', $decodedToken['user']['id'])->firstOrFail();
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
    private function registerUser(Request $request)
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
    public function getTokenFromUser(User $user)
    {
        try {
            return JWTAuth::fromUser($user, $this->getCustomClaims($user));
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * This invalidates the current token and generate new token with latest user information
     * and user scope
     *
     * @return bool
     * @throws JWTException
     */
    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            $decodedToken = JWTAuth::decode($token);

            if ($decodedToken) {
                $user = User::where('id', $decodedToken['user']['id'])->firstOrFail();
                // if user, invalidate the current token and return new token
                JWTAuth::invalidate($token);
                return $this->getTokenFromUser($user);
            }
            throw new JWTException();
        }
        throw new JWTException();
    }

    /**
     * Authenticate user and return token
     *
     * @param Request $request
     * @return mixed
     * @throws InvalidCredentialException
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $authUser = User::where("email", $request->get('email'))->first();

        if (! $authUser) {
            throw new InvalidCredentialException();
        }

        if (! $token = JWTAuth::attempt($credentials, $this->getCustomClaims($authUser))) {
            throw new InvalidCredentialException();
        }

        return $token;
    }

    /**
     * Returns array of data to be attached to token
     *
     * @param User $user
     * @return array
     */
    private function getCustomClaims(User $user)
    {
        return [
            "user" => new UserResource($user),
            "scope" => $this->getScope($user)
        ];
    }

    /**
     * Return array of sections and business options user has access to
     *
     * @param User $user
     * @return array
     */
    private function getScope(User $user)
    {
        // business options id whose status isn't locked
        $businessOptionScope = $user->business->businessOptions()
            ->where('status', '!=', 'locked')->where('status', '!=', 'irrelevant')->pluck('business_option_id');

        // get section_id of business options which are unlocked
        $sectionScope = BusinessOption::whereIn('id', $businessOptionScope)->pluck('section_id')->unique()->values();

        return [
            "sectionScope" => $sectionScope,
            "businessOptionScope" => $businessOptionScope
        ];
    }

    public function getScopeFromToken()
    {
        try {
            if (JWTAuth::getToken()) {
                $decodedToken = JWTAuth::decode(JWTAuth::getToken());

                if ($decodedToken) {
                    return $decodedToken['scope'];
                }
            }
        } catch (\Exception $exception) {
        }

        return null;
    }

    public function unlockedBusinessOptionIds()
    {
        $scope = $this->getScopeFromToken();
        $ids = $scope['businessOptionScope'];

        if (! $ids) {
            $ids = BusinessOption::whereIn('id', config('mbj.unlocked_business_option'))->pluck('id');
        }

        return $ids;
    }

}