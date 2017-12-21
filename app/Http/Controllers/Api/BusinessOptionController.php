<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Http\Resources\Api\BusinessOptionResourceCollection;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;

class BusinessOptionController extends BaseApiController
{
    public function index(Level $level, Section $section)
    {
        //get data
        $business_options = BusinessOption::with('parent', 'children')
            ->where('section_id', $section->id)
            ->get();

        return new BusinessOptionResourceCollection($business_options);
    }

    public function show(Level $level, Section $section, BusinessOption $business_option)
    {
        $business_option->with('parent', 'children');

        $prev = $this->getPreviousRecord($section, $business_option);
        $next = $this->getNextRecord($section, $business_option);

        $links = [
            'self' => "/levels/{$level->id}/sections/{$section->id}/business-options/{$business_option->id}",
        ];

        if ($prev) {
            $links['prev'] = "/levels/{$level->id}/sections/{$prev->section->id}/business-options/{$prev->id}";
        }

        if ($next) {
            $links['next'] = "/levels/{$level->id}/sections/{$next->section->id}/business-options/{$next->id}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
    }

    public function getPreviousRecord($section, $business_option)
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

    public function getNextRecord($section, $business_option)
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

}
