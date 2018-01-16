<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BusinessOptionValidation\EntryBusinessOptionRequest;
use App\Http\Resources\Api\BusinessOptionResource;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessMeta;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Request;
use Mockery\Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class BusinessOptionController extends BaseApiController
{
    use BusinessOptionable, Authenticable;

    /**
     * Upload directory relative to public folder
     * @var string
     */
    protected $upload_directory = 'images/business-options/';

    /*
    |--------------------------------------------------------------------------
    | Resource Routes
    |--------------------------------------------------------------------------
    |
    | Any General Business Option can be handled normally using these methods.
    |
    */
    /**
     * Gets the first Business Option using Level and Section
     *
     * @param Level $level
     * @param Section $section
     * @return BusinessOptionResource
     */
    public function first(Level $level, Section $section)
    {
        $business_option = $this->getFirstBusinessOption($level, $section);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns a single business option with related business-meta data
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @return BusinessOptionResource
     */
    public function show(Level $level, Section $section, BusinessOption $business_option)
    {
        $business_option = $this->getBusinessOption($level, $section, $business_option);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns next business-option
     *
     * It uses current business-option to order higher business-options by menu-order
     *
     * @param Request $request
     * @param $level
     * @param $section
     * @param $business_option
     * @return BusinessOptionResource
     */
    public function next(Request $request, Level $level, Section $section, BusinessOption $business_option)
    {
        //if query has business_category_id or user is authenticated
        // then include it as well in the query
        $business_category_id = 1;

        if ($request->get('business_category_id')) {
            $business_category_id = $request->get('business_category_id');
        }

        if ($user = $this->getAuthUser()) {
            $business_category_id = $user->business->business_category_id;
        }

        $business_option = $this->getNextRecord($business_option, $business_category_id);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns previous business-option
     *
     * It uses current business-option to order lower business-options by menu-order
     *
     * @param Request $request
     * @param $level
     * @param $section
     * @param $business_option
     * @return BusinessOptionResource
     */
    public function previous(Request $request, Level $level, Section $section, BusinessOption $business_option)
    {
        //if query has business_category_id or user is authenticated
        // then include it as well in the query
        $business_category_id = null;

        if ($request->get('business_category_id')) {
            $business_category_id = $request->get('business_category_id');
        }

        if ($user = $this->getAuthUser()) {
            $business_category_id = $user->business->business_category_id;
        }

        $business_option = $this->getPreviousRecord($level, $section, $business_option, $business_category_id);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Insert/Update specified Business Option
     *
     * It also insert/update related pivot tables to track progress
     * and also insert/update business-meta data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function save(Request $request)
    {
        try {
            $authUser = $this->getAuthUser();
            $business_option_id = $request->get('business_option_id');
            if (! ($business_option_id && $authUser)) {
                throw new \Exception('invalid_request', 400);
            }
            $business = $authUser->business;
            //updates the business meta
            if ($business_option_id && $request->get('business_meta')) {
                $business_meta = $request->get('business_meta');
                foreach ($business_meta as $key => $value) {
                    if (preg_match('#^data:image/\w+;base64,#i', $value)){
                        // remove the part that we don't need from the provided image and decode it
                        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $value));
                        $file_path = $this->upload_directory . uniqid("logo_" . $business->id . "_") . '.jpg';
                        $success = file_put_contents($file_path, $data);
                        if (!$success) {
                            throw new \Exception('failed_to_save_image', 500);
                        }

                        $value = uniqid("logo_" . $business->id . "_") . '.jpg';
                    };

                    $businessMeta = $business->businessMetas()
                        ->where('business_option_id', $business_option_id)
                        ->where('key', $key)
                        ->first();
                    if ($businessMeta) {
                        $businessMeta->fill(['value' => $value])->save();
                    } else {
                        $business->businessMetas()->create([
                            'business_option_id' => $business_option_id,
                            'key' => $key,
                            'value' => $value
                        ]);
                    }

                }
            }

            // Sync create_business business option
            $business_option_status = $request->get('business_option_status') ? $request->get('business_option_status') : 'done';
//            if ($request->get('business_option_status') && $business && $business->id && $business_option_id) {
//                $business_meta = BusinessMeta::where('business_id', $business->id)->where('business_option_id', $business_option_id)->delete();
//            }
            $data = [
                'business_category_id' => $business->business_category_id,
                'business_option_status' => $business_option_status
            ];
            $businessOption = BusinessOption::find($business_option_id);
            $this->syncBusinessPivotTables($business, BusinessOption::find($business_option_id), $data);

            //return response
            return response()->json([
                'business' => $business,
                'business_option' => new BusinessOptionResource($businessOption)
            ], 200);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
//            throw new \Exception('unknown_error', 500);
        }
    }

    public function update(Request $request)
    {
        if ($request->get("type") === "user_register") {
            //save user form
        }

        if ($request->get("type") === "create_business") {
            //save user form
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Special Methods for Handling Special Entry Business Options
    |--------------------------------------------------------------------------
    |
    | These business options are unique in the sense that some are called
    | even before user is registered and are saved either in users table
    | or in businesses table instead of business_metas table
    |
    */

    /**
     * Gets Business Option : business-category
     *
     * @return BusinessOptionResource
     */
    public function getBusinessCategoryBusinessOption()
    {
        $level = Level::where('id', 1)->first();
        $section = Section::where('id', 1)->first();
        $businessOption = BusinessOption::where('id', 1)->first();

        return $this->show($level, $section, $businessOption);
    }

    /**
     * Gets Business Option: sell-goods
     *
     * @return BusinessOptionResource
     */
    public function getSellGoodsBusinessOption()
    {
        $level = Level::where('id', 1)->first();
        $section = Section::where('id', 1)->first();
        $businessOption = BusinessOption::where('id', 2)->first();

        return $this->show($level, $section, $businessOption);
    }

    /**
     * Gets Business Option: about-you
     *
     * @return BusinessOptionResource
     */
    public function getAboutYouBusinessOption()
    {
        $level = Level::where('id', 1)->first();
        $section = Section::where('id', 2)->first();
        $businessOption = BusinessOption::where('id', 3)->first();

        return $this->show($level, $section, $businessOption);
    }

    /**
     * Saves Business Option: business-category, about-you, sell-goods
     *
     * @param EntryBusinessOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function saveEntryBusinessOption(EntryBusinessOptionRequest $request)
    {
        try {
            //create user
            //response will return token and user
            $userInfo = $this->userRegister($request);

            //create business with business_category_id, user_id and sell_goods
            $business_category_id = $request->get('business_category_id') ? $request->get('business_category_id') : 1;
            $business = Business::create([
                'user_id' => $userInfo['user']['id'],
                'business_category_id' => $business_category_id,
                'sell_goods' => $request->get('sell_goods') ? $request->get('sell_goods') : false
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

            //return user and token
            return response()->json($userInfo);
        } catch (\Exception $exception) {
            throw new Exception('unknown_error', 500);
        }

    }

    /**
     * Saves Business Option: About You
     *
     * If not authenticated, register user and create business for the user
     *
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     * @internal param bool $returnResponse
     */
    public function saveAboutYouBusinessOption(Request $request) {
        //if user is authenticated, then it means we need to update
        if ($user = $this->getAuthUser()) {
            //update user info except email
            $inputs = $request->only('first_name', 'last_name', 'phone_number', 'password');

            try {
                $user->fill($inputs)->save();
                $token = JWTAuth::fromUser($user);

                // Sync create_business business option
                $data = [
                    'business_category_id' => $user->business->business_category_id,
                    'business_option_status' => 'done'
                ];
                $this->syncBusinessPivotTables($user->business, BusinessOption::find(3), $data);

                //return response
                return response()->json([
                    'token' => $token,
                    'user' => $user
                ], 200);
            } catch (\Exception $exception) {
                throw new Exception('unknown_error', 500);
            }
        }
    }

    /**
     * Insert/update Business Option: business-category
     *
     * This return jsonResponse by default but can be set to return array of data.
     * This is especially useful when called from inside another function.
     *
     * @param Request $request
     * @internal param $data
     * @internal param $userInfo
     * @internal param bool $returnResponse
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveBusinessCategoryBusinessOption(Request $request)
    {
        try {
            $business_category_id = $request->get('business_category_id');
            $authUser = $this->getAuthUser();
            $business = $authUser->business;

            if ($business->business_category_id !== $business_category_id) {
                //updates the business category
                $business->fill(['business_category_id' => $business_category_id])->save();

                //sync the business_business_option table
                //get the business_options_id for the new and old categories
                $new_business_options = BusinessCategory::find($business_category_id)->businessOptions()
                    ->where('business_category_id', $business_category_id)->pluck('id')->toArray();
                $old_business_options = $business->businessOptions()
                    ->where('status', '!=', 'irrelevant')
                    ->pluck('id')->toArray();

                //compare
                $new_addition = array_diff($new_business_options, $old_business_options);
                $not_relevant = array_diff($old_business_options, $new_business_options);

                //if new: add
                $business->businessOptions()->detach($new_addition);
                $business->businessOptions()->attach($new_addition);

                //if old un-required: update with status irrelevant
                $business->businessOptions()->detach($not_relevant);
                $not_relevant_data = [];
                foreach ($not_relevant as $item) {
                    $not_relevant_data[$item] = ['status' => 'irrelevant'];
                }
                $business->businessOptions()->attach($not_relevant_data);

                // Sync create_business business option
                $data = [
                    'business_category_id' => $business->business_category_id,
                    'business_option_status' => 'done'
                ];

                $this->syncBusinessPivotTables($business, BusinessOption::find(1), $data);

            }

            //return response
            return response()->json([
                'business' => $business
            ], 200);

        } catch (\Exception $exception) {
            throw new Exception('unknown_error', 500);
        }

    }

    /**
     * Insert/update Business Option: sell-goods
     *
     * This return jsonResponse by default but can be set to return array of data.
     * This is especially useful when called from inside another function.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param $data
     * @internal param $userInfo
     * @internal param bool $returnResponse
     */
    public function saveSellGoodsBusinessOption(Request $request)
    {
        try {
            $sell_goods = $request->get('sell_goods');
            $authUser = $this->getAuthUser();
            $business = $authUser->business;

            if ($business->sell_goods !== $sell_goods) {
                //updates the business category
                $business->fill(['sell_goods' => $sell_goods])->save();

                // Sync create_business business option
                $data = [
                    'business_category_id' => $business->business_category_id,
                    'business_option_status' => 'done'
                ];
                $this->syncBusinessPivotTables($business, BusinessOption::find(2), $data);

                //return response
                return response()->json([
                    'business' => $business
                ], 200);
            }

        } catch (\Exception $exception) {
            throw new Exception('unknown_error', 500);
        }
    }

    /**
     * Insert/update Business Option: create-business
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function saveCreateBusinessBusinessOption(Request $request)
    {
        try {
            $inputs = $request->only('business_name', 'website');
            $authUser = $this->getAuthUser();
            $business = $authUser->business;

            //updates the business category
            $business->fill($inputs)->save();

            // Sync create_business business option
            $data = [
                'business_category_id' => $business->business_category_id,
                'business_option_status' => 'done'
            ];
            $this->syncBusinessPivotTables($business, BusinessOption::find(4), $data);

            //return response
            return response()->json([
                'business' => $business
            ], 200);

        } catch (\Exception $exception) {
            throw new \Exception('unknown_error', 500);
        }
    }

    /**
     * Insert/update Business Option: register-business
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function saveRegisterBusinessBusinessOption(Request $request) {
        try {
            $inputs = $request->only('abn');
            $authUser = $this->getAuthUser();
            $business = $authUser->business;

            //updates the business category
            $business->fill($inputs)->save();

            // Sync create_business business option
            $data = [
                'business_category_id' => $business->business_category_id,
                'business_option_status' => 'done'
            ];
            $this->syncBusinessPivotTables($business, BusinessOption::find(5), $data);

            //return response
            return response()->json([
                'business' => $business
            ], 200);
        } catch (\Exception $exception) {
            throw new \Exception('unknown_error', 500);
        }
    }

}
