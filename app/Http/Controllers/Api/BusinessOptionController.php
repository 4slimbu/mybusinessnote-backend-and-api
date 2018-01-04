<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;

class BusinessOptionController extends BaseApiController
{
    public function index($level, $section)
    {
        //get data
        $level = Level::where(function($q) use ($level) {
            $q->where('id', $level)
                ->orWhere('slug', $level);
        })->first();

        if (! $level) {
            return response()->json("Model not found", 400);
        }

        $section = Section::where(function($q) use ($section) {
                $q->where('id', $section)
                    ->orWhere('slug', $section);
        })->where('level_id', $level->id)->first();

        if (! $section) {
            return response()->json("Model not found", 400);
        }

        $business_option = BusinessOption::with('parent', 'children', 'affiliateLinks')
            ->where('section_id', $section->id)->first();

        if (! $business_option) {
            return response()->json("Model not found", 400);
        }

        $prev = $this->getPreviousRecord($section, $business_option);
        $next = $this->getNextRecord($section, $business_option);

        $links = [
            'self' => "/level/{$level->slug}/section/{$section->slug}/business-option/{$business_option->slug}",
        ];

        if ($prev) {
            $links['prev'] = "/level/{$level->slug}/section/{$prev->section->slug}/business-option/{$prev->slug}";
        }

        if ($next) {
            $links['next'] = "/level/{$level->slug}/section/{$next->section->slug}/business-option/{$next->slug}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
    }

    public function show($level,$section,$business_option)
    {
        //get data
        $level = Level::where(function($q) use ($level) {
            $q->where('id', $level)
                ->orWhere('slug', $level);
        })->first();

        if (! $level) {
            return response()->json("Model not found", 400);
        }

        $section = Section::where(function($q) use ($section) {
            $q->where('id', $section)
                ->orWhere('slug', $section);
        })->where('level_id', $level->id)->first();

        if (! $section) {
            return response()->json("Model not found", 400);
        }

        $business_option = BusinessOption::with('parent', 'children', 'affiliateLinks')
            ->where('section_id', $section->id)
            ->where(function($q) use ($business_option) {
            $q->where('id', $business_option)
                ->orWhere('slug', $business_option);
        })->first();

        if (! $business_option) {
            return response()->json("Model not found", 400);
        }

        $prev = $this->getPreviousRecord($section, $business_option);
        $next = $this->getNextRecord($section, $business_option);

        $links = [
            'self' => "/level/{$level->slug}/section/{$section->slug}/business-option/{$business_option->slug}",
        ];

        if ($prev) {
            $links['prev'] = "/level/{$level->slug}/section/{$prev->section->slug}/business-option/{$prev->slug}";
        }

        if ($next) {
            $links['next'] = "/level/{$level->slug}/section/{$next->section->slug}/business-option/{$next->slug}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
    }

    public function first(Level $level, Section $section)
    {
        $business_option = BusinessOption::where('section_id', $section->id)->first();

        if ($business_option) {
            return $this->show($level, $section, $business_option);
        }

        return response()->json(["not found"], 400);
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
