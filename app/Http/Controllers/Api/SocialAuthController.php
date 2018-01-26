<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessOption;
use App\Models\User;
use App\Traits\BusinessOptionable;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialAuthController extends Controller
{
    use BusinessOptionable;
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $provider
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function handleProviderCallback($provider)
    {
        try {
            $account = Socialite::driver($provider)->stateless()->user();
            if ($account) {
                $name = explode(' ', $account->getName());
                $last_name = array_pop($name);
                $first_name = implode(' ', $name);
                $input = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $account->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $account->getId()
                ];

                switch ($provider) {
                    case 'google':
                        return $this->loginUsingGoogle($input);
                        break;
                    case 'facebook':
                        return $this->loginUsingFacebook($input);
                        break;
                    default:
                }
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'error_code' => $exception->getMessage()
            ]);
        }
    }

    public function loginUsingGoogle($input)
    {
        $user = User::where('provider_id', $input['provider_id'])->where('verified', 1)->first();

        if ($user) {
            return $this->login($user);
        } else {
            return $this->register($input);
        }
    }

    public function loginUsingFacebook($input)
    {
        $user = User::where('provider_id', $input['provider_id'])->where('verified', 1)->first();

        if ($user) {
            return $this->login($user);
        } else {
            return $this->register($input);
        }
    }

    /**
     * API Register, on success return JWT Auth token
     *
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function register($input)
    {
        //check if email already exist through different provider
        if (User::where('email', $input['email'])->first()) {
            throw new Exception('user_already_exist', 500);
        }
        //add some default data to user
        $input['role_id'] = 2; //role: customer
        $input['verified'] = 1; //email verification not required for now
        $input['history'] = json_encode([
            'last_visited' => 'business_option?level=getting-started&section=your-business-details'
        ]);
        $user = User::create($input);

        try {
            // attempt to verify the credentials and create a token for the user
            $customClaims = [
                "user" => $user
            ];
            if (! $token = JWTAuth::fromUser($user, $customClaims)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }

        //set up business for user with default data
        $this->setUpUserBusiness($user);
        // all good so return the token
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function login($user)
    {
        try {
            $customClaims = [
                "user" => $user
            ];
            if (! $token = JWTAuth::fromUser($user, $customClaims)) {
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
     * Saves Business Option: business-category, about-you, sell-goods
     *
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     * @internal param $user
     * @internal param EntryBusinessOptionRequest $request
     */
    public function setUpUserBusiness($user)
    {
        try {
            //create business with business_category_id, user_id and sell_goods
            $business_category_id = 1;
            $business = Business::create([
                'user_id' => $user->id,
                'business_category_id' => $business_category_id,
                'sell_goods' => false
            ]);

            // Set up business_business_options with all the available business_options
            $relevant_business_options = BusinessCategory::find($business_category_id)->businessOptions()
                ->where('business_category_id', $business_category_id)->pluck('id');
            $business->businessOptions()->attach($relevant_business_options);

            //sync business with default business options determined by business_category_id
            $data = [
                'business_category_id' => $business_category_id,
                'business_option_status' => 'done'
            ];
            // Sync business_category business option
            $this->syncBusinessPivotTables($business, BusinessOption::find(1), $data);
            // Sync sell_goods business Option
            if ($business_category_id != 4) {
                $this->syncBusinessPivotTables($business, BusinessOption::find(2), $data);
            }
            // Sync about you business option
            $this->syncBusinessPivotTables($business, BusinessOption::find(3), $data);

        } catch (\Exception $exception) {
            throw new Exception('unknown_error', 500);
        }

    }
}
