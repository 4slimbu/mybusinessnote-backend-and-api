<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BusinessOptionValidation\EntryBusinessOptionRequest;
use App\Http\Resources\Api\BusinessOptionResource;
use App\Models\Business;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Request;

class BusinessOptionController extends BaseApiController
{
    use BusinessOptionable, Authenticable;

    //TODO: improve this barely working code

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
     * @return $this|\Illuminate\Http\JsonResponse
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
    public function show($level, $section, $business_option)
    {
        $business_option = $this->getBusinessOption($level, $section, $business_option);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns next business-option using current business-option order by menu-order
     * if no next option: throw model not found exception
     *
     * @param Request $request
     * @param $level
     * @param $section
     * @param $business_option
     * @return BusinessOptionResource
     */
    public function next(Request $request, $level, $section, $business_option)
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

        dd($business_category_id);
        $business_option = $this->getNextRecord($level, $section, $business_option, $business_category_id);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns previous business-option using current business-option order by menu-order
     * if no next option: throw model not found exception
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @return BusinessOptionResource
     */
    public function previous($level, $section, $business_option)
    {
        $business_option = $this->getPreviousRecord($level, $section, $business_option);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Insert/Update specified Business Option along with
     * related pivot tables to track progress
     * and also insert/update business-meta data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {

        if ($request->get("type") === "register_user") {
            $userResponse = null;

            //save user form
            //TODO: use db transaction
            $userResponse = $this->userRegister($request);

            if ($request->get('user_id')) {
//                $user = User::find('id', $request->get('user_id'));
//                $user->fill($request->only('first_name', 'last_name', 'phone_number'))->save();
//                $business = $user->business;
//
//                $business->businessOptions()->attach([3 => ['status' => 'done']]);
//                $business->sections()->attach([2 => ['completed_percent' => 100]]);
//                $business->levels()->attach([1 => ['completed_percent' => 50]]);

                return response()->json([
                    'success' => true,
                    'message' => "User updated successfully"
                ], 201);
            } else {
                $business = Business::create([
                    'user_id' => $userResponse['user']->id,
                    'business_category_id' => $request->get('business_category_id'),
                    'sell_goods' => $request->get('sell_goods')
                ]);

                $business->businessOptions()->attach([2 => ['status' => 'done']]); //for business category
                $business->businessOptions()->attach([3 => ['status' => 'done']]);
                $business->sections()->attach([1 => ['completed_percent' => 100]]);
                $business->sections()->attach([2 => ['completed_percent' => 100]]);

                $business->levels()->attach([1 => ['completed_percent' => count($business->sections) * 25]]);
            }


            if ($userResponse) {
                return response()->json([
                    'success' => true,
                    'token' => $userResponse['token']
                ], 201);
            }

        }

        if ($request->get("type") === "update_business") {
            $business = Business::where('id', $request->get('business_id'))->first();
            $business->update($request->only('business_category_id', 'sell_goods', 'business_name', 'website', 'abn'));

            $business->businessOptions()->detach($request->get('business_option_id'));
            $business->businessOptions()->attach([$request->get('business_option_id') => ['status' => 'done']]); //for business category

            $sectionId = BusinessOption::find($request->get('business_option_id'))->section_id;
            $levelId = Section::find($sectionId)->level_id;

            $business->sections()->detach($sectionId);
            $business->sections()->attach([$sectionId => ['completed_percent' => 100]]);
            $business->levels()->detach($levelId);

            $business->levels()->attach([1 => ['completed_percent' => count($business->sections) * 25]]);

            return response()->json([
                'success' => true,
                'message' => "Updated Successfully"
            ], 200);
        }

        return response()->json("Unable to save data", 500);
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
    | Some parts in these methods are hard-coded : like slug.
    | That's why these are special.
    |
    */


    /**
     * Gets Business Option with slug: business-category
     *
     * @return BusinessOptionController|\Illuminate\Http\JsonResponse
     */
    public function getBusinessCategoryBusinessOption()
    {
        return $this->first('getting-started', 'business-category');
    }

    /**
     * Gets Business Option with slug: sell-goods
     *
     * @return BusinessOptionController|\Illuminate\Http\JsonResponse
     */
    public function getSellGoodsBusinessOption()
    {
        return $this->first('getting-started', 'sell-goods');
    }


    /**
     * Gets Business Option with slug: about-you
     *
     * @return BusinessOptionController|\Illuminate\Http\JsonResponse
     */
    public function getAboutYouBusinessOption()
    {
        return $this->first('getting-started', 'about-you');
    }

    /**
     * Saves Business Option with slugs: business-category, about-you, sell-goods
     *
     * @param EntryBusinessOptionRequest $request
     */
    public function saveEntryBusinessOption(EntryBusinessOptionRequest $request)
    {
        $this->saveBusinessCategoryBusinessOption($request->only($this->businessCategoryFields));
        $this->saveSellGoodsBusinessOption($request->all());
        $this->saveAboutYouBusinessOption($request->all());
    }
}
