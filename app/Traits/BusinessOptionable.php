<?php
namespace App\Traits;

use App\Events\LevelOneCompleteEvent;
use App\Models\Business;
use App\Models\BusinessBusinessOption;
use App\Models\BusinessCategoryBusinessOption;
use App\Models\BusinessMeta;
use App\Models\BusinessOption;
use Carbon\Carbon;

trait BusinessOptionable
{

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
        $business->sections()->attach([$business_option->section->id => [
            'completed_percent' => $section_completed_percent,
            'updated_at' => Carbon::now()
        ]]);
        $response['section'] = ($section_current_completed_percent < 100 && $section_completed_percent >= 100) ? true : false;

        //sync business_level table
        $level_current_completed_percent = $business->levels()->where('id', $business_option->level->id)->first() ?
            $business->levels()->where('id', $business_option->level->id)->first()->pivot->completed_percent : 0;
        $level_completed_percent = $this->getLevelCompletedPercent($business, $business_option);
        $business->levels()->detach($business_option->level->id);
        $business->levels()->attach([$business_option->level->id => [
            'completed_percent' => $level_completed_percent,
            'updated_at' => Carbon::now()
        ]]);
        $response['level'] = ($level_current_completed_percent < 100 && $level_completed_percent >= 100) ? true : false;

        //fire event
        if ($business_option->level->id === 1 && $level_current_completed_percent < 100 && $level_completed_percent >= 100) {
            event(new LevelOneCompleteEvent($business->user));
        }

        return $response;
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

    /**
     * Refresh Pivot table business_business_option for given business
     *
     * This function refresh or create relation data between business and business_option which will be used to
     * generate relevant business option list for particular business. It removes the intense calculation and persistence
     * of database which otherwise would be needed in every request. Also, it facilitates performing
     * various tracking tasks.
     *
     * This function need to be called only if any changes to the database are made that affects the
     * visibility of business-option on any particular business:
     * 1. admin updates business option's category list
     * 2. admin adds/deletes business option
     * 3. admin updates menu order of business option
     * 3. obviously when user register as business need to be setup automatically for the user
     *
     * @param Business $business
     */
    public function refreshBusinessBusinessOption(Business $business)
    {
        $existingBusinessOptionIds = BusinessBusinessOption::where('business_id', $business->id)->pluck('business_option_id');
        $newBusinessOptionIds = BusinessOption::pluck('id');
        $irrelevantBusinessOptionIds = BusinessCategoryBusinessOption::where('business_category_id', $business->business_category_id)->pluck('business_option_id');

        $needToAddBusinessOptionIds = $newBusinessOptionIds->diff($existingBusinessOptionIds)->values();
        $needToRemoveBusinessOptionIds = $existingBusinessOptionIds->diff($newBusinessOptionIds)->values();
        $needToUpdateBusinessOptionIds = $existingBusinessOptionIds->diff($irrelevantBusinessOptionIds)->values();

        if (count($needToAddBusinessOptionIds) > 0) {
            if (count($needToAddBusinessOptionIds) === count($newBusinessOptionIds)) {
                $business->businessOptions()->attach($needToAddBusinessOptionIds);
            } else {
                //TODO: if any of the higher menu order business option id is not locked then status = unlocked else locked
                $business->businessOptions()->attach($needToAddBusinessOptionIds, ['status' => 'unlocked']);
            }
        }

        if (count($needToRemoveBusinessOptionIds) > 0) {
            $business->businessOptions()->detach($needToRemoveBusinessOptionIds);
            //remove related data from business_meta table as well
            BusinessMeta::where('business_id', $business->id)
                ->whereIn('business_option_id', $needToRemoveBusinessOptionIds)->delete();
        }

        if (count($needToUpdateBusinessOptionIds) > 0) {
            BusinessBusinessOption::where('business_id', $business->id)
                ->whereIn('business_option_id', $needToUpdateBusinessOptionIds)->update(['status' => 'irrelevant']);
        }
    }

}