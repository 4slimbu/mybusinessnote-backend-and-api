<?php
namespace App\Http\Controllers\Admin;


use App\Models\BusinessCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BusinessCategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessCategories = BusinessCategory::all();
        return view('admin/business_category/index', compact('businessCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/business_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd(request('title'));

        $this->validate($request, [
            'title' => 'required'
        ]);

        BusinessCategory::create([

            'title' => request('title'),
            'tooltip' => request('tooltip')

        ]);
        return back()->with('success','New business category has been created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        return view('admin/business_category.edit', compact('businessCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $input = $request->all();
        $businessCategory->fill($input)->save();

        return redirect()->back()->with('success','Business category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {

        $result = $businessCategory->delete();
        return back()->with('success','Business category removed!');
    }
}
