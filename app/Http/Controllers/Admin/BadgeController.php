<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Badge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;

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
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required'
        ]);

        $badge = new Badge;
        $badge->name = $request->input('name');
        $badge->message = $request->input('message');

        //Image Upload
        $icon = $request->file('icon');
       if($icon != "")
       {
        $destination_path = 'badges/icons/';
        $imagename = str_random(32).$icon->getClientOriginalName();
        $icon->move($destination_path,$imagename); 
        $badge->icon = $imagename;
       }
           
        if($badge->save())
        {

        // Badge::create([

        //     'name' => request('name'),
        //     'message' => request('message')

        // ]);
        return back()->with('success','New badge has been added!');
    }
    else
    {
        return back()->with('success','data not saved') ; 
       }
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
    public function edit($id)
    {
        $badge = Badge::where('id','=',$id)->first();
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $this->validate($request, [
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 

        $data = Input::except('_token','submit');
        if(Input::hasFile('icon'))
       {
            $file = $data['icon'];
            $name = str_random(32).$file->getClientOriginalName();
            $file->move(public_path().'badges\icons',$name);
            $data['icon']=$name;
       }
       Badge::where('id','=',$id)->update($data);
        return redirect('admin/badges')->with('success','Business badge successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Badge::where('id','=',$id)->delete();
        return back()->with('success','Business badge removed!');
    }
}
