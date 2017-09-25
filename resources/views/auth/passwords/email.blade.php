@extends('layouts/master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <h1 class="text-center">Reset Password</h1>
                <p class="lead text-center">
                    Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
                </p>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                          
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary btn-outline-rounded">
                                    Send Password Reset Link
                                </button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
