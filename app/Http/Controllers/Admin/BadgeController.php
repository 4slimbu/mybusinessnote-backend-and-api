<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Badge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = Badge::all();
        return view('admin.badges.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.badges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'message' => 'required'
        ]);

        Badge::create([

            'name' => request('name'),
            'message' => request('message')

        ]);
        return back()->with('success','New badge has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Badge $badge)
    {
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required'
        ]);

        $input = $request->all();
        $badge->fill($input)->save();

        return redirect()->back()->with('success','Business badge successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        $result = $badge->delete();
        return back()->with('success','Business badge removed!');
    }
}
