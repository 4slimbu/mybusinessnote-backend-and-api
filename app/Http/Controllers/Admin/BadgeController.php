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

        

        //Image Upload
        $icon = $request->file('icon');
       if($icon != "")
       {
        $destination_path = 'images/badges/';
        $imagename = str_random(32).$icon->getClientOriginalName();
        $icon->move($destination_path,$imagename); 
        
       }

       Badge::create([
        'name' =>request('name'),
        'icon' => $imagename,
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
    public function edit($badge)
    {
        $badge = Badge::find($badge);
        //$badge = Badge::where('id','=',$id)->first();
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$badge)
    {
        $this->validate($request, [
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 

        //$data = Input::except('_token','submit');
        $badges = Badge::find($badge);
        $img = $request->file('icon');
        if($img != "")
       {
            $file = $img;
            $name = str_random(32).$file->getClientOriginalName();
            $file->move(public_path().'\images\badges',$name);

       $badges->name = request('name');
       $badges->message = request('message');
       $badges->icon = $name;

       $badges->save();

        return redirect('admin/badges')->with('success','Business badge successfully updated!');
           
       }
       else
       {
        $badges->name = request('name');
       $badges->message = request('message');

       $badges->save();

        return redirect('admin/badges')->with('success','Business badge successfully updated!');
       }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy( $badge)
    {
        Badge::destroy($badge);
        return back()->with('success','Business badge removed!');
    }
}
