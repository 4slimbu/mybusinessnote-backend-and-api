<?php

namespace App\Http\Controllers\Admin;


use App\Events\UserRegistered;
use App\Http\Requests\Admin\CustomerValidation\CreateFormValidation;
use App\Http\Requests\Admin\CustomerValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\User;
use Session, AppHelper;


class CustomerController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.customer';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.customer';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Customer';


     /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = array( 

        [ 'link' => 'customer/create', 'label' => 'Add New'],
        [ 'link' => '#', 'label' => 'Export to Excel']
        
    );

    /**
     * Display a listing of the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = User::customer()->orderBy('id', 'desc')
            ->paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //initialize
        $data = [];

        //get data
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param CreateFormValidation|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {
        $inputs = $request->all();
        $inputs['role_id'] = 2;

        $user = User::create($inputs);

        //fire event
        //$user won't return all fields so need another query
        event(new UserRegistered(User::find($user->id)));

        //response
        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified customer.
     *
     * @param User $customer
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param User $customer
     * @return \Illuminate\Http\Response
     * @internal param \App\Models\Customer $customer
     */
    public function edit(User $customer)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $customer;
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified customer in storage.
     *
     * @param UpdateFormValidation $request
     * @param User $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, User $customer)
    {
        $request->offsetUnset('role_id');
        $input = $request->all();
        $customer->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param  \App\Models\User $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        $customer->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
