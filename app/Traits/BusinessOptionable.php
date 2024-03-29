<?php

namespace App\Traits;

use App\Events\LevelOneCompleteEvent;
use App\Http\Resources\Api\BusinessStatusResource;
use App\Models\Business;
use App\Models\BusinessBusinessOption;
use App\Models\BusinessCategoryBusinessOption;
use App\Models\BusinessLevel;
use App\Models\BusinessMeta;
use App\Models\BusinessOption;
use App\Models\BusinessSection;
use App\Models\Level;
use App\Models\Section;
use Carbon\Carbon;

trait BusinessOptionable
{
    /**
     * Set up Business related pivot tables with default values
     *
     * @param Business $business
     */
    public function setupBusiness(Business $business)
    {
        $this->setupBusinessBusinessOptions($business);
        $this->setupBusinessLevels($business);
        $this->setupBusinessSections($business);
    }

    /**
     * Set up Business's related business options with default values
     *
     * @param $business
     */
    public function setupBusinessBusinessOptions($business)
    {
        // Only pick business options that fall on the business's category.
        $relatedBusinessOptionIds = $business->businessCategory->businessOptions()->pluck('id');

        // Start from clean slate
        $existingBusinessIds = BusinessBusinessOption::where('business_id', $business->id)->pluck('business_id');
        if ($existingBusinessIds) {
            BusinessBusinessOption::whereIn('business_id', $existingBusinessIds)->delete();
        }

        // Set up related business options for current business.
        if (count($relatedBusinessOptionIds) > 0) {
            foreach ($relatedBusinessOptionIds as $item) {
                $business->businessOptions()->attach($item, ['status' => 'locked', 'created_at' => Carbon::now()]);
            }
        }
    }

    /**
     * Set up Business's related levels with default values
     *
     * @param $business
     */
    public function setupBusinessLevels($business)
    {
        $levelIds = Level::pluck('id');

        // Start from clean slate
        $existingBusinessIds = BusinessLevel::where('business_id', $business->id)->pluck('business_id');
        if ($existingBusinessIds) {
            BusinessLevel::whereIn('business_id', $existingBusinessIds)->delete();
        }

        // Set up related business options for current business.
        if (count($levelIds) > 0) {
            foreach ($levelIds as $item) {
                $business->levels()->attach($item, ['completed_percent' => 0, 'created_at' => Carbon::now()]);
            }
        }
    }

    /**
     * Set up business's related sections with default values
     *
     * @param $business
     */
    public function setupBusinessSections($business)
    {
        $sectionIds = Section::pluck('id');

        // Start from clean slate
        $existingBusinessIds = BusinessSection::where('business_id', $business->id)->pluck('business_id');
        if ($existingBusinessIds) {
            BusinessSection::whereIn('business_id', $existingBusinessIds)->delete();
        }

        // Set up related business options for current business.
        if (count($sectionIds) > 0) {
            foreach ($sectionIds as $item) {
                $business->sections()->attach($item, ['completed_percent' => 0, 'created_at' => Carbon::now()]);
            }
        }
    }

    /**
     * Refresh Business related pivot tables with default values
     *
     * Cases to Use:
     * When admin deletes/adds/changes-business-option-menu-order or when user updates business category
     *
     * @param Business $business
     */
    public function refreshBusiness(Business $business)
    {
        $this->refreshBusinessBusinessOptions($business);
        $this->refreshBusinessLevels($business);
        $this->refreshBusinessSections($business);

        // Sync sections completed percent
	    $sections = $business->sections()->get();
	    foreach ( $sections as $section ) {
		    // Get current section completed percent
		    $currentSectionCompletedPercent = $this->getSectionCompletedPercent($business, $section->id);

		    // Update section completed percent with new value
		    $business->sections()->detach($section->id);
		    $business->sections()->attach([$section->id => [
			    'completed_percent' => $currentSectionCompletedPercent,
			    'updated_at'        => Carbon::now(),
		    ]]);
	    }

	    // Sync level completed percent
	    $levels = $business->levels()->get();
	    foreach ( $levels as $level ) {
		    // Get current level completed percent
		    $currentSectionCompletedPercent = $this->getSectionCompletedPercent($business, $level->id);

		    // Update level completed percent with new value
		    $business->levels()->detach($level->id);
		    $business->levels()->attach([$level->id => [
			    'completed_percent' => $currentSectionCompletedPercent,
			    'updated_at'        => Carbon::now(),
		    ]]);
	    }

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
    public function refreshBusinessBusinessOptions($business)
    {
        // This returns list of business_option_ids for current business from business_business_option table
        $existingBusinessOptionIds = BusinessBusinessOption::where('business_id', $business->id)->pluck('business_option_id');

        // This returns all business_options
        $allBusinessOptionIds = BusinessOption::pluck('id');

        // This returns all the business_options available for current business_option category
        $relatedBusinessOptionIds = BusinessCategoryBusinessOption::where('business_category_id', $business->business_category_id)->pluck('business_option_id');

        // We will always add all the business options for each business, but un-related business options will have status: irrelevant
        // So, diff of allbusinessOptions and already existingBusinessOptions will give the business options that we need to add
        // This case will arise only when business option is added to the system
        $needToAddBusinessOptionIds = $allBusinessOptionIds->diff($existingBusinessOptionIds)->values();

        // This will return ids of businessOptions that we need to remove.
        // This case will arise when business options is deleted from the system
        $needToRemoveBusinessOptionIds = $existingBusinessOptionIds->diff($allBusinessOptionIds)->values();

        // This will return ids of business options whose status we need to update
        // This case will arise when user change business category, in which case, some business options may become irrelevant to current business
        $needToUpdateBusinessOptionIds = $existingBusinessOptionIds->diff($relatedBusinessOptionIds)->values();

        // add new business options
        if (count($needToAddBusinessOptionIds) > 0) {
            // add new business options
            foreach ($needToAddBusinessOptionIds as $item) {
                // if other business options exist whose menu_order is higher than the current one and have status unlocked
                // then current business option should also have status unlocked else it should have status locked
                $currentBusinessOption = BusinessOption::find($item);
                $higherUnlockedBusinessOptionCount = $business->businessOptions()->where('menu_order', '>', $currentBusinessOption->menu_order)
                    ->where('status', '!=', 'locked')->count();

                if ($higherUnlockedBusinessOptionCount > 0) {
                    $business->businessOptions()->attach($item, ['status' => 'unlocked']);
                } else {
                    $business->businessOptions()->attach($needToAddBusinessOptionIds, ['status' => 'locked']);
                }
            }
        }

        // remove deleted business options
        if (count($needToRemoveBusinessOptionIds) > 0) {
            $business->businessOptions()->detach($needToRemoveBusinessOptionIds);
            //remove related data from business_meta table as well
            BusinessMeta::where('business_id', $business->id)
                ->whereIn('business_option_id', $needToRemoveBusinessOptionIds)->delete();
        }

        // update unwanted business options status to irrelevant
        if (count($needToUpdateBusinessOptionIds) > 0) {
            BusinessBusinessOption::where('business_id', $business->id)
                ->whereIn('business_option_id', $needToUpdateBusinessOptionIds)->update(['status' => 'irrelevant']);
        }
    }

    /**
     * Refresh Business's related levels with default values
     *
     * @param $business
     */
    public function refreshBusinessLevels($business)
    {
        $levelIds = Level::pluck('id');

        // Get all the related levels for current business
        $existingLevelIds = BusinessLevel::where('business_id', $business->id)->pluck('level_id');

        // This case will arise only when level is added to the system
        $needToAddLevelIds = $levelIds->diff($existingLevelIds)->values();

        // This case will arise when level is deleted from the system
        $needToDeleteLevelIds = $existingLevelIds->diff($levelIds)->values();

        // This will add new levels to the business_level table
        if (count($needToAddLevelIds) > 0) {
            foreach ($levelIds as $item) {
                $business->levels()->attach($item, ['completed_percent' => 0, 'created_at' => Carbon::now()]);
            }
        }

        // This will remove deleted levels from the business_level table
        if (count($needToDeleteLevelIds) > 0) {
            BusinessLevel::whereIn('level_id', $needToDeleteLevelIds)->delete();
        }
    }

    /**
     * Refresh Business's related sections with default values
     *
     * @param $business
     */
    public function refreshBusinessSections($business)
    {
        $sectionIds = Section::pluck('id');

        // Get all the related sections for current business
        $existingSectionIds = BusinessSection::where('business_id', $business->id)->pluck('section_id');

        // This case will arise only when section is added to the system
        $needToAddSectionIds = $sectionIds->diff($existingSectionIds)->values();

        // This case will arise when section is deleted from the system
        $needToDeleteSectionIds = $existingSectionIds->diff($sectionIds)->values();

        // This will add new sections to the business_section table
        if (count($needToAddSectionIds) > 0) {
            foreach ($sectionIds as $item) {
                $business->sections()->attach($item, ['completed_percent' => 0, 'created_at' => Carbon::now()]);
            }
        }

        // This will remove deleted sections from the business_section table
        if (count($needToDeleteSectionIds) > 0) {
            BusinessSection::whereIn('section_id', $needToDeleteSectionIds)->delete();
        }
    }

	/**
	 * Unlock next relevant business option for given business
	 *
	 * @param Business $business
	 * @param BusinessOption $currentBusinessOption
	 *
	 * @return null
	 */
    public function unlockNextBusinessOption(Business $business, BusinessOption $currentBusinessOption)
    {
        $nextBusinessOption = $business->businessOptions()
            ->where('menu_order', '>', $currentBusinessOption->menu_order)->first();

        if ($nextBusinessOption) {
            if ($nextBusinessOption->pivot['status'] === 'locked') {
                BusinessBusinessOption::where('business_id', $business->id)
                    ->where('business_option_id', $nextBusinessOption->id)->update(['status' => 'unlocked']);

                return $nextBusinessOption;
            }
        }

        return null;
    }

	/**
	 * Unlock next relevant business option for given business
	 *
	 * @param Business $business
	 * @param $level_id
	 *
	 * @return bool
	 * @internal param Level $level
	 *
	 */
	public function unlockBusinessOptions(Business $business, $level_id)
	{
		$businessOptionIds = $business->businessOptions()
		                               ->where('level_id', $level_id)->pluck('id');

		if ($businessOptionIds) {
				BusinessBusinessOption::where( 'business_id', $business->id )
				                      ->where( 'status', 'locked' )
				                      ->whereIn('business_option_id', $businessOptionIds)
				                      ->update(['status' => 'unlocked']);

				return true;
		}

		return false;
	}

    /**
     * This will get level, section and business option statuses for current business option
     *
     * @param $business
     * @param $currentBusinessOption
     * @return BusinessStatusResource
     */
    public function refreshAllRelatedStatusForCurrentBusinessOption(Business $business, BusinessOption $currentBusinessOption)
    {
        $data['levelStatus'] = $business->levels()->where('id', $currentBusinessOption->level_id)->get();
        $data['sectionStatus'] = $business->sections()->where('id', $currentBusinessOption->section_id)->get();
        $data['businessOptionStatus'] = $business->businessOptions()->where('id', $currentBusinessOption->id)->get();

        return new BusinessStatusResource($business, $data);
    }

    /**
     * This will get level, section and business option statuses for current business option
     *
     * @param $business
     * @param $currentBusinessOption
     * @return BusinessStatusResource
     */
    public function refreshAllRelatedStatusForCurrentAndNextBusinessOption(Business $business, BusinessOption $currentBusinessOption)
    {
        $nextBusinessOption = $business->businessOptions()
            ->where('menu_order', '>', $currentBusinessOption->menu_order)->first();

        $data['levelStatus'] = $business->levels()->where('id', $currentBusinessOption->level_id)->orWhere('id', $nextBusinessOption->level_id)->get();
        $data['sectionStatus'] = $business->sections()->where('id', $currentBusinessOption->section_id)->orWhere('id', $nextBusinessOption->section_id)->get();
        $data['businessOptionStatus'] = $business->businessOptions()->where('id', $currentBusinessOption->id)
                                                                    ->orWhere('id', $currentBusinessOption->parent_id)
                                                                    ->orWhere('id', $nextBusinessOption->id)->get();

        return new BusinessStatusResource($business, $data);
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
        $business_option_status = ($data['business_option_status']) ? $data['business_option_status'] : null;

        //-----------------------------------
        //sync business_business_option table
        //-----------------------------------
        BusinessBusinessOption::where('business_id', $business->id)
            ->where('business_option_id', $business_option->id)->update(['status' => $business_option_status]);

        //---------------------------
        //sync business_section table
        //---------------------------

        // Get initial section completed_percent
        $initialSectionCompletedPercent = BusinessSection::where('business_id', $business->id)
            ->where('section_id', $business_option->section_id)->first()->completed_percent;

        // Get current section completed percent
        $currentSectionCompletedPercent = $this->getSectionCompletedPercent($business, $business_option->section_id);

        // Update section completed percent with new value
        $business->sections()->detach($business_option->section_id);
        $business->sections()->attach([$business_option->section_id => [
            'completed_percent' => $currentSectionCompletedPercent,
            'updated_at'        => Carbon::now(),
        ]]);

        // Add event object to response if section has completed just now
        if (($initialSectionCompletedPercent < 100 && $currentSectionCompletedPercent >= 100)) {
            $apiSession = resolve('ApiSession');

            $events = $apiSession->get('events') ? $apiSession->get('events') : [];
            $events[] = [
                'type' => 'sectionCompleted',
                'section_id' => $business_option->section_id,
            ];;
            $apiSession->attach('events', $events);
        }

        //-------------------------
        //sync business_level table
        //-------------------------

	    // Get initial level completed_percent
	    $initialLevelCompletedPercent = BusinessLevel::where('business_id', $business->id)
	                                                     ->where('level_id', $business_option->level_id)->first()->completed_percent;

	    // Get current level completed percent
	    $currentLevelCompletedPercent = $this->getLevelCompletedPercent($business, $business_option->level_id);

        // Update section completed percent with new value
        $business->levels()->detach($business_option->level_id);
        $business->levels()->attach([$business_option->level_id => [
            'completed_percent' => $currentLevelCompletedPercent,
            'updated_at'        => Carbon::now(),
        ]]);

        // Add event object to response if section has completed just now
        if (($initialLevelCompletedPercent < 100 && $currentLevelCompletedPercent >= 100)) {
            $apiSession = resolve('ApiSession');

            $events = $apiSession->get('events') ? $apiSession->get('events') : [];
            $events[] = [
                'type' => 'levelCompleted',
                'level_id' => $business_option->level_id,
            ];;
            $apiSession->attach('events', $events);

            // Unlock business options from next level
	        $nextLevel = Level::where( 'id', '>', $business_option->level_id )->where( 'is_active', 1 )->first();
	        if ($nextLevel) {
		        $this->unlockBusinessOptions( $business, $nextLevel->id );
	        }
        }

        //fire event
        //Todo: Improve this part
        if ($business_option->level_id === 1 && $initialLevelCompletedPercent < 100 && $currentLevelCompletedPercent >= 100) {
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
	 * @param $section_id
	 *
	 * @return float|int
	 * @internal param Section $section
	 *
	 * @internal param BusinessOption $business_option
	 */
    private function getSectionCompletedPercent(Business $business, $section_id)
    {
        //get total weight of  business options under given business
        $business_options_total_weight = $business->businessOptions()
            ->where('section_id', $section_id)
            ->where('status', '!=', 'irrelevant')->sum('weight');

	    if (! ($business_options_total_weight > 0 )) {
	    	return 0;
	    }

        //get total weight of completed business options under given section
        $completed_business_options_weight = $business->businessOptions()
            ->where('section_id', $section_id)
            ->where('status', 'done')->sum('weight');

        //calculate percent
        return ($completed_business_options_weight / $business_options_total_weight) * 100;
    }

	/**
	 * This function calculate level completed_percent from its section completed_percent
	 *
	 * @param Business $business
	 * @param $level_id
	 *
	 * @return float|int
	 * @internal param Level $level
	 *
	 * @internal param BusinessOption $businessOption
	 */
    private function getLevelCompletedPercent(Business $business, $level_id)
    {
        //get total sections count
        $total_sections = Section::where('level_id', $level_id)->where('is_active', 1)->count();

	    if (! ($total_sections > 0)) {
	    	return 0;
	    }

        //get completed sections count
        $completed_sections = $business->sections()->where('level_id', $level_id)
                                                   ->where('completed_percent', 100)->count();

        //calculate percent
        return ($completed_sections / $total_sections) * 100;
    }

}