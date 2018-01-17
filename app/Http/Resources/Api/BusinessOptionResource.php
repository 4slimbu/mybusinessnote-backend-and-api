<?php

namespace App\Http\Resources\Api;

use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use App\Traits\Authenticable;
use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
{
    use Authenticable;
    protected $additionalData;

    public function __construct($resource, $additionalData = null)
    {
        parent::__construct($resource);
        $this->additionalData = $additionalData;
    }

    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $business_meta = [];
        $business_business_option_status = null;
        $user = $this->getAuthUser();
        if ($user) {
            $business_meta = $this->businessMetas()->where('business_id', $user->business->id)->get();
            if (count($business_meta) > 0) {
                $business_meta = $business_meta->pluck('value', 'key')->toArray();
            }
            $business_business_option_status = $this->business()->where('business_id', $user->business->id)->select('status')->first();
            if ($business_business_option_status) {
                $business_business_option_status = $business_business_option_status->status;
            }
        }

        return [
            'id' => $this->id,
            'level_id' => $this->level->id,
            'levels' => ($user) ? $this->getLevels($user->business): null,
            'level' => ($user) ? $this->getLevel($user->business, $this->level->id) : null,
            'section' => ($user) ? $this->getSection($user->business, $this->level, $this->section->id): null,
            'level_slug' => $this->level->slug,
            'section_id' => $this->section->id,
            'section_slug' => $this->section->slug,
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'element' => $this->element,
            'tooltip' => $this->tooltip,
            'weight' => $this->weight,
            //prevent infinite loop when called using relationship
            'affiliate_links' => $this->affiliateLinks,
            'business_meta' => $business_meta,
            'business_business_option_status' => $business_business_option_status,
            'links' => [
                'prev' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id . '/previous',
                'self' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id,
                'next' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id . '/next'
            ]
        ];
    }

    private function getLevel($business, $level_id)
    {
        //get data
        $level = Level::select('id', 'name', 'slug', 'icon')->where('id', $level_id)->orderBy('menu_order')->first();

        //get levels data and set completed_percent to 0
        $data = $level->toArray();
        $data["completed_percent"] = 0;
        $data["total_sections"] = count($level->sections);
        //set completed_percent to actual percent on touched levels
        if (isset($business->levels)) {
            foreach ($business->levels as $b_level) {
                if ($b_level->id == $level->id) {
                    $data["completed_percent"] = $b_level->pivot->completed_percent;
                }
            }
        }

        $sectionData = $this->getSections($business, $level);

        $data["total_completed_sections"] = $sectionData['total_completed_sections'];
        $data["sections"] = $sectionData['sections'];

        return $data;
    }

    private function getSection($business, $level, $section_id)
    {

        //get data
        $section = Section::select('id', 'level_id', 'slug', 'name', 'icon')->where('id', $section_id)
            ->where("level_id", $level->id)->first();
        $total_completed_sections = 0;

        //get sections data and set completed_percent to 0
        //get levels data and set completed_percent to 0
        $data = $section->toArray();
        $data["red_icon"] = asset('images/icons/sections/red/' . $section->icon );
        $data["white_icon"] = asset('images/icons/sections/white/' . $section->icon );
        $data["completed_percent"] = 0;

        //set completed_percent to actual percent on touched sections
        if (isset($business->sections)) {
            foreach ($business->sections as $b_section) {
                if ($b_section->id == $section->id) {
                    $data["completed_percent"] = $b_section->pivot->completed_percent;
                    if ($data["completed_percent"] === 100) {
                        $total_completed_sections +=1;
                    }
                }

            }
        }


        return $data;
    }

    private function getLevels($business)
    {
        //get data
        $data = [];
        $levels = Level::select('id', 'name', 'slug', 'icon')->orderBy('menu_order')->get();

        //get levels data and set completed_percent to 0
        foreach ($levels as $level) {

            $arr = $level->toArray();
            $arr["completed_percent"] = 0;
            $arr["total_sections"] = count($level->sections);
            //set completed_percent to actual percent on touched levels
            if (isset($business->levels)) {
                foreach ($business->levels as $b_level) {
                    if ($b_level->id == $level->id) {
                        $arr["completed_percent"] = $b_level->pivot->completed_percent;
                    }
                }
            }

            $sectionData = $this->getSections($business, $level);

            $arr["total_completed_sections"] = $sectionData['total_completed_sections'];
            $arr["sections"] = $sectionData['sections'];

            array_push($data, $arr);
        }

        return $data;
    }

    private function getSections($business, $level)
    {

        //get data
        $data = [];
        $sections = Section::select('id', 'level_id', 'slug', 'name', 'icon')->where("level_id", $level->id)->get();
        $total_completed_sections = 0;

        //get sections data and set completed_percent to 0
        //get levels data and set completed_percent to 0
        foreach ($sections as $section) {
            $arr = $section->toArray();
            $arr["red_icon"] = asset('images/icons/sections/red/' . $section->icon );
            $arr["white_icon"] = asset('images/icons/sections/white/' . $section->icon );
            $arr["completed_percent"] = 0;

            //set completed_percent to actual percent on touched sections
            if (isset($business->sections)) {
                foreach ($business->sections as $b_section) {
                    if ($b_section->id == $section->id) {
                        $arr["completed_percent"] = $b_section->pivot->completed_percent;
                        if ($arr["completed_percent"] === 100) {
                            $total_completed_sections +=1;
                        }
                    }

                }
            }

            array_push($data, $arr);
        }


        return [
            "sections" => $data,
            "total_completed_sections" => $total_completed_sections
        ];
    }

}
