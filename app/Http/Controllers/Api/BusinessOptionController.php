<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BusinessOptionValidation\EntryBusinessOptionRequest;
use App\Http\Resources\Api\BusinessOptionResource;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Mockery\Exception;

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
     * Returns next business-option using current business-option order by menu-order
     * if no next option: throw model not found exception
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
        $business_category_id = null;

        if ($request->get('business_category_id')) {
            $business_category_id = $request->get('business_category_id');
        }

        if ($user = $this->getAuthUser()) {
            $business_category_id = $user->business->business_category_id;
        }

        $business_option = $this->getNextRecord($level, $section, $business_option, $business_category_id);
        return new BusinessOptionResource($business_option);
    }

    /**
     * Returns previous business-option using current business-option order by menu-order
     * if no next option: throw model not found exception
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
        $userInfo = $this->saveAboutYouBusinessOption($request, false);
        try {
            $this->saveBusinessCategoryBusinessOption($request->only('business_category_id'), $userInfo, false);
            $this->saveSellGoodsBusinessOption($request->only('sell_goods'), $userInfo, false);
            $this->syncBusinessPivotTables();

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
     * @param bool $returnResponse
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    private function saveAboutYouBusinessOption(Request $request, $returnResponse = true) {

        //if user is authenticated, then it means we need to update
        if ($user = $this->getAuthUser()) {
            //update user info except email
            $inputs = $request->only('first_name', 'last_name', 'phone_number', 'password');
            try {
                $user->fill($inputs)->save();

                //return response
                if ($returnResponse) {
                    return response()->json(['user' => $user], 200);
                } else {
                    return ['user' => $user];
                }
            } catch (\Exception $exception) {
                throw new Exception('unknown_error', 500);
            }

        //else register user
        } else {
            $response = $this->userRegister($request);
            $response['business'] = Business::create(['user_id' => $response['user']->id]);

            //return response
            if ($returnResponse) {
                return response()->json($response, 201);
            }
            return $response;
        }
    }

    private function saveBusinessCategoryBusinessOption($data, $userInfo, $returnResponse = true)
    {


    }

    private function saveSellGoodsBusinessOption($data, $userInfo, $returnResponse = true)
    {

    }

    private function syncBusinessPivotTables(Business $business, BusinessOption $business_option, $data)
    {
        $business_category_id = ($data['business_category_id']) ? $data['business_category_id'] : null;
        $business_option_status = ($data['business_option_status']) ? $data['business_option_status'] : null;

        //sync business_business_option table
        $business->businessOptions()->detach($business_option->id);
        $business->businessOptions()->attach([$business_option->id => ['status' => $business_option_status]]);

        //TODO: improve
        //sync business_section table
        //when there is business_category_id as filter, it is applied to section only for now
        //assuming at least one business-option will be there in a section and no of section in a level is constant
        //but it can change in the future
        $section_completed_percent = $this->getSectionCompletedPercent($business, $business_option, $business_category_id);
        $business->sections()->detach($business_option->section->id);
        $business->sections()->attach([$business_option->section->id => ['completed_percent' => $section_completed_percent]]);

        //sync business_level table
        $level_completed_percent = $this->getLevelCompletedPercent($business, $business_option);
        $business->levels()->detach($business_option->level->id);
        $business->levels()->attach([1 => ['completed_percent' => $level_completed_percent]]);
    }

    private function getSectionCompletedPercent(Business $business, BusinessOption $business_option, $business_category_id = null)
    {
        //get total weight of  business options under given business_category_id and section
        if ($business_category_id) {
            $business_options_total_weight = BusinessCategory::find($business_category_id)
                ->businessOptions()->where('section_id', $business_option->section->id)
                ->sum('weight');
        //else get total business option under given section
        } else {
            $business_options_total_weight = BusinessOption::where('section_id', $business_option->section->id)
                ->sum('weight');
        }

        //get total weight of completed business options under given section
        $completed_business_options_weight = $business->businessOptions()
            ->where('section_id', $business_option->section->id)
            ->where('status', 'done')->sum('weight');

        //calculate percent
        return ($completed_business_options_weight / $business_options_total_weight) * 100;
    }

    private function getLevelCompletedPercent(Business $business, BusinessOption $businessOption)
    {
        //get total sections count
        $total_sections = $businessOption->level->sections()->count();

        //get completed sections count
        $completed_sections = $business->sections()->where('completed_percent', 100)->count();

        //calculate percent
        return ($completed_sections/$total_sections) * 100;
    }


}
