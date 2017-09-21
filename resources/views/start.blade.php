@extends('layouts/master')

@section('content')


    <div class="container">
        <div class="main-content">
            <section class="registration">

                <div class="row">
                    <div class="col-md-2">

                        <ul class="nav nav-pills flex-column mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-start-tab" data-toggle="pill" href="#pills-start" role="tab" aria-controls="pills-start" aria-expanded="true"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-foundation-tab" data-toggle="pill" href="#pills-foundation" role="tab" aria-controls="pills-foundation" aria-expanded="true"><i class="fa fa-cube" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-building-tab" data-toggle="pill" href="#pills-building" role="tab" aria-controls="pills-building" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-running-tab" data-toggle="pill" href="#pills-running" role="tab" aria-controls="pills-running" aria-expanded="true"><i class="fa fa-road" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-10">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-start" role="tabpanel" aria-labelledby="pills-start-tab">

                                <div class="text-center">
                                    <i class="img-intro icon-checkmark-circle"></i>
                                </div>
                                <h1 class="head text-center">Getting Started</h1>
                                <p class="lead text-center">
                                    What industry is your business idea in - select the best fit below. Don’t worry you <br/>can always change your selection later.
                                </p>


                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Step 1
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">Select a Category</h4>
                                                <form>

                                                    <div class="form-group input-group input-group-unstyled">

                                                        <select class="form-control custom-select" id="businessCategory">
                                                            <option>General</option>
                                                            <option>Tradie</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                        <span class="input-group-addon"><i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></span>

                                                    </div>

                                                    <div class="form-group">
                                                        <p>Will you also be selling goods online?</p>
                                                        <label class="custom-control custom-radio">
                                                            <input id="selling_goods_online1" name="selling_goods_online" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Yes</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="selling_goods_online2" name="selling_goods_online" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>

                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Step 2
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">Your Details</h4>
                                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                                        <input placeholder="First Name" id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                        @endif

                                                    </div>

                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                                                        <input placeholder="Last Name" id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                                        @endif

                                                    </div>


                                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">

                                                        <input placeholder="Phone Name" id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                                        @if ($errors->has('phone_number'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                                        @endif

                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                                        <input placeholder="E-Mail Address" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                        @endif

                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                        <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                        @endif

                                                    </div>

                                                    <div class="form-group">

                                                        <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                                    </div>

                                                    <div class="form-group">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Step 3
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">Business Details</h4>
                                                <form class="form-horizontal" method="POST" action="">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">

                                                        <input placeholder="Your Business Name" id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name') }}" required autofocus>

                                                        @if ($errors->has('business_name'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('business_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;http://</span>
                                                            <input class="form-control" type="url" placeholder="Web Address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Step 4
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">Register your business with the Australian Government</h4>
                                                <form class="form-horizontal" method="POST" action="">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <a target="_blank" href="https://register.business.gov.au/registration/type" class="btn btn-success btn-outline-rounded"> Register Now <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="tab-pane fade" id="pills-foundation" role="tabpanel" aria-labelledby="pills-foundation-tab">


                                <div class="text-center">
                                    <i class="img-intro icon-checkmark-circle"></i>
                                </div>
                                <h1 class="head text-center">Setting the Foundations</h1>
                                <p class="lead text-center">
                                    Which area would you like to work on first?
                                </p>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                Choose where to start
                                            </div>
                                            <div class="card-body text-left">

                                                <form>

                                                    <div class="form-group">

                                                        <select class="form-control custom-select" id="businessCategory" v-model="selected">
                                                            <option value="marketing" selected>Marketing</option>
                                                            <option value="operation">Operation</option>
                                                            <option value="finance">Finance</option>
                                                        </select>
                                                    </div>

                                                    <div v-if="selected === 'marketing'" class="options" id="option1">

                                                        <h4 class="card-title">Marketing</h4>
                                                        <div class="form-group">
                                                            <h5 class="card-title">Branding</h5>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Logo + Tag line</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Theme Colors to be used</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Website (landing page to begin)</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <h5 class="card-title">Social Media Integration</h5>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Twitter</span>
                                                            </label>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Facebook</span>
                                                            </label>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">LinkedIn</span>
                                                            </label>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Instagram</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">

                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Business Cards</span>
                                                            </label>

                                                        </div>

                                                    </div>

                                                    <div v-if="selected === 'operation'" class="options" id="option2">

                                                        <h4 class="card-title">Operations</h4>
                                                        <div class="form-group">

                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Email Setup</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" required>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Phone Setup</span>
                                                            </label>
                                                        </div>


                                                    </div>

                                                    <div v-if="selected === 'finance'" class="options" id="option3">

                                                        <h4 class="card-title">Finance</h4>
                                                        <div class="form-group">
                                                            <label class="custom-control custom-checkbox">
                                                                <input id="selling_goods_online1" name="selling_goods_online" type="checkbox" class="custom-control-input">
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Initial Accounting Software</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="custom-control custom-checkbox">
                                                                <input id="selling_goods_online1" name="selling_goods_online" type="checkbox" class="custom-control-input">
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Business Banking</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="custom-control custom-checkbox">
                                                                <input id="selling_goods_online1" name="selling_goods_online" type="checkbox" class="custom-control-input">
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">Merchant Facilities</span>
                                                            </label>
                                                        </div>

                                                    </div>



                                                    <div class="form-group mb-0">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-cube" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="tab-pane fade" id="pills-building" role="tabpanel" aria-labelledby="pills-building-tab">


                                <div class="text-center">
                                    <i class="img-intro icon-checkmark-circle"></i>
                                </div>
                                <h1 class="head text-center">Building up the Business</h1>
                                <p class="lead text-center">
                                    Which area would you like to work on first?
                                </p>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                Choose where to start
                                            </div>
                                            <div class="card-body text-center">

                                                <form>

                                                    <div class="form-group">

                                                        <select class="form-control custom-select" id="businessCategory">
                                                            <option value="marketing">Marketing</option>
                                                            <option value="Legal">Legal</option>
                                                            <option value="Human Resources">Human Resources</option>
                                                            <option value="Finance">Finance</option>
                                                            <option value="Operations">Operations</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea placeholder="SWOT" class="form-control" id="swot" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea placeholder="Customer Analysis" class="form-control" id="customerAnalysis" rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="tab-pane fade" id="pills-running" role="tabpanel" aria-labelledby="pills-running-tab">


                                <div class="text-center">
                                    <i class="img-intro icon-checkmark-circle"></i>
                                </div>
                                <h1 class="head text-center">Running the Business</h1>
                                <p class="lead text-center">
                                    What industry is your business idea in - select the best fit below. Don’t worry you can always change your selection later.
                                </p>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Step 1
                                            </div>
                                            <div class="card-body text-center">

                                                <form>

                                                    <div class="form-group">
                                                        <label for="businessCategory"><h4 class="card-title">Select a Category</h4></label>
                                                        <select class="form-control custom-select" id="businessCategory">
                                                            <option>General</option>
                                                            <option>Tradie</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <p>Will you also be selling goods online?</p>
                                                        <label class="custom-control custom-radio">
                                                            <input id="selling_goods_online1" name="selling_goods_online" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Yes</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="selling_goods_online2" name="selling_goods_online" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>

                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <a href="" class="btn btn-success btn-outline-rounded"> Next Step <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </div>

@endsection
