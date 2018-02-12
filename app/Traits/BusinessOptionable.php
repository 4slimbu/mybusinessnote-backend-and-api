<?php
namespace App\Traits;

use App\Events\LevelOneCompleteEvent;
use App\Models\Busines;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait BusinessOptionable
{
    /**
     * @param $level
     * @param $section
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|null|static
     */
    private function getSectionFirstBusinessOption($level, $section)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    private function getSectionLastBusinessOption($level, $section)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)->orderBy('id', 'desc')->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    private function getLevelFirstBusinessOption($level)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    private function getLevelLastBusinessOption($level)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->orderBy('id', 'desc')->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    private function getBusinessOption($level, $section, $business_option)
    {
        try {
            // Get Business Option
            $business_option = BusinessOption::with('parent', 'children', 'level', 'section', 'affiliateLinks')
                ->where('level_id', $level->id)
                ->where('section_id', $section->id)
                ->where('id', $business_option->id)
                ->first();

            return $business_option;
        } catch (\Exception $exception){
            throw new ModelNotFoundException('not_found', 400);
        }
    }

    /**
     * This returns next business-option determined by menu-order
     * filtered by business_category_id
     *
     * Complex oldGetNextRecord has been deprecated in favour of this simple solution.
     *
     * Old used complex calculation to find next child or next sibling or next section etc.
     * This one uses more straight forward search using menu-order which will always put
     * favourable child, sibling or section next to current business-option. This will be achieved
     * by using drag-and-drop feature in the backend.
     *
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function getNextRecord( $business_option, $business_category_id)
    {
        try {
            $next = BusinessCategory::find($business_category_id)
                ->businessOptions()->where('id', '>', $business_option->id)
                ->orderBy('id', 'asc')
                ->first();
            return $next;
        } catch (\Exception $exception) {
            throw new ModelNotFoundException('not_found', 400);
        }

    }

    /**
     * This returns previous business-option determined by menu-order
     * filtered by business_category_id
     *
     * Complex oldGetNextRecord has been deprecated in favour of this simple solution.
     *
     * Old used complex calculation to find previous child or previous sibling or previous section etc.
     * This one uses more straight forward search using menu-order which will always put
     * favourable child, sibling or section previous to current business-option. This will be achieved
     * by using drag-and-drop feature in the backend.
     *
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function getPreviousRecord($business_option, $business_category_id)
    {
        try {
            $previous = BusinessCategory::find($business_category_id)
                ->businessOptions()->where('id', '<', $business_option->id)
                ->orderBy('id', 'desc')
                ->first();

            return $previous;
        } catch (\Exception $exception) {
            throw new ModelNotFoundException('not_found', 400);
        }

    }

    /**
     * This method has been deprecated to more simple solution.
     *
     * @param $section
     * @param $business_option
     * @return null
     * @internal param $level
     * @internal param $business_category_id
     */
    private function oldGetPreviousRecord($section, $business_option)
    {
        //if has children
        if ($child_business_option = $business_option->children->first()) {
            $next = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $child_business_option->parent_id)
                ->where('id', '<', $child_business_option->id)
                ->orderBy('id', 'desc')
                ->first();

            return $next;
        }

        //if has Sibling
        $nextSibling = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '<', $business_option->id)
            ->orderBy('id', 'desc')
            ->first();

        if ($nextSibling) {
            return $nextSibling;
        }

        //if has Parent
        if ($business_option->parent) {
            $nextParent = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $business_option->parent->id)
                ->where('id', '<', $business_option->parent->id)
                ->orderBy('id', 'desc')
                ->first();
            if ($nextParent) {
                return $nextParent;
            }
        }

        //if next section
        $nextSection = Section::where('level_id', $section->level_id)
            ->where('id', '<', $section->id)
            ->orderBy('id', 'desc')
            ->first();

        if ($nextSection) {
            $nextSectionFirstBusinessOption = BusinessOption::where('section_id', $nextSection->id)
                ->first();
            if ($nextSectionFirstBusinessOption) {
                return $nextSectionFirstBusinessOption;
            }
        }
    }

    /**
     * This method has been deprecated to more simple solution.
     *
     * @param $level
     * @param $section
     * @param $business_option
     * @param $business_category_id
     * @return null
     */
    private function oldNetNextRecord($level, $section, $business_option, $business_category_id)
    {
        //if has children
        if ($child_business_option = $business_option->children->first()) {
            $next = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $child_business_option->parent_id)
                ->where('id', '>', $child_business_option->id)
                ->orderBy('id', 'asc')
                ->first();

            return $next;
        }

        //if has Sibling
        $nextSibling = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '>', $business_option->id)
            ->orderBy('id', 'asc')
            ->first();

        if ($nextSibling) {
            return $nextSibling;
        }

        //if has Parent
        if ($business_option->parent) {
            $nextParent = BusinessOption::where('section_id', $section->id)
                ->where('parent_id', $business_option->parent->id)
                ->where('id', '>', $business_option->parent->id)
                ->orderBy('id', 'asc')
                ->first();
            if ($nextParent) {
                return $nextParent;
            }
        }

        //if next section
        $nextSection = Section::where('level_id', $section->level_id)
            ->where('id', '>', $section->id)
            ->orderBy('id', 'asc')
            ->first();
        if ($nextSection) {
            $nextSectionFirstBusinessOption = BusinessOption::where('section_id', $nextSection->id)
                ->first();
            if ($nextSectionFirstBusinessOption) {
                return $nextSectionFirstBusinessOption;
            }
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Private Helper Functions
    |--------------------------------------------------------------------------
    */


    /**
     * API Update User Info
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    private function userUpdate(Request $request, User $user)
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
     * Sync Business related pivot tables: business_business_option, business_section, business_level
     *
     * Once a certain business option is saved, this function updates all the related pivot table of the
     * particular business. It includes business_option status, section completed_percent, level completed_percent
     * for the business.
     *
     * @param Business $business
     * @param BusinessOption $business_option
     * @param $data
     * @return array
     */
    private function syncBusinessPivotTables(Business $business, BusinessOption $business_option, $data)
    {
        $response = [];
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

        $section_current_completed_percent = $business->sections()->where('id', $business_option->section->id)->first() ?
            $business->sections()->where('id', $business_option->section->id)->first()->pivot->completed_percent : 0;
        $section_completed_percent = $this->getSectionCompletedPercent($business, $business_option, $business_category_id);
        $business->sections()->detach($business_option->section->id);
        $business->sections()->attach([$business_option->section->id => ['completed_percent' => $section_completed_percent]]);
        $response['section'] = ($section_current_completed_percent < 100 && $section_completed_percent >= 100) ? true : false;

        //sync business_level table
        $level_current_completed_percent = $business->levels()->where('id', $business_option->level->id)->first() ?
            $business->levels()->where('id', $business_option->level->id)->first()->pivot->completed_percent : 0;
        $level_completed_percent = $this->getLevelCompletedPercent($business, $business_option);
        $business->levels()->detach($business_option->level->id);
        $business->levels()->attach([$business_option->level->id => ['completed_percent' => $level_completed_percent]]);
        $response['level'] = ($level_current_completed_percent < 100 && $level_completed_percent >= 100) ? true : false;

        //fire event
        if ($business_option->level->id === 1 && $level_current_completed_percent < 100 && $level_completed_percent >= 100) {
            event(new LevelOneCompleteEvent($business->user));
        }

        return $response;
        //user earns a badge if level_completed percent is 100
//        if ($level_completed_percent >= 100) {
//            $business->user->badges()->attach([$business_option->level->id]);
//        }
    }

    /**
     * This calculate section completed percent from the weight of its business options
     *
     * If business_category_id is provided it filters its business_option and calculate the completed percent
     * accordingly
     *
     * @param Business $business
     * @param BusinessOption $business_option
     * @return float|int
     * @internal param null $business_category_id
     */
    private function getSectionCompletedPercent(Business $business, BusinessOption $business_option)
    {
        //get total weight of  business options under given business_category_id and section
        $business_options_total_weight = $business->businessOptions()
            ->where('section_id', $business_option->section->id)
            ->where('status', '!=', 'irrelevant')->sum('weight');;
        //get total weight of completed business options under given section
        $completed_business_options_weight = $business->businessOptions()
            ->where('section_id', $business_option->section->id)
            ->where('status', 'done')->sum('weight');

        //calculate percent
        return ($completed_business_options_weight / $business_options_total_weight) * 100;
    }

    /**
     * This function calculate level completed_percent from its section completed_percent
     *
     * @param Business $business
     * @param BusinessOption $businessOption
     * @return float|int
     */
    private function getLevelCompletedPercent(Business $business, BusinessOption $businessOption)
    {
        //get total sections count
        $total_sections = $businessOption->level->sections()->count();

        //get completed sections count
        $completed_sections = $business->sections()->where('level_id', $businessOption->level_id)->where('completed_percent', 100)->count();
        //calculate percent
        return ($completed_sections/$total_sections) * 100;
    }

}