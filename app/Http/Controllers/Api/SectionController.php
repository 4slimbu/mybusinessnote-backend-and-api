<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\SectionResource;
use App\Http\Resources\Api\SectionResourceCollection;
use App\Models\Level;
use App\Models\Section;

class SectionController extends ApiBaseController
{
    public function index()
    {
        //get data
        $sections = Section::with('level')->get();

        return new SectionResourceCollection($sections);

    }

    public function show(Level $level, Section $section)
    {
        return new SectionResource($section);
    }
}
