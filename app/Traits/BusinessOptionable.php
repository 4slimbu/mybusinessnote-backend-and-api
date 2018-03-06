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
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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

}