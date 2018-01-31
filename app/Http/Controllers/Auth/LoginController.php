<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override validateLogin method from the authenticateUsers
     *
     * @return void
     */
    protected function validateLogin()
    {

        $this->validate(request(), [
            'email' => 'required|exists:users,email,verified,1', 'password' => 'required'
        ], [
            'email.exists' => 'The selected email is invalid or the account has not been activated.'
        ]);
    }

    /**
     * Override credentials method from the authenticateUsers
     *
     * @param Request $request
     * @return void
     */

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (Auth::user() && Auth::user()->role->id === 1) {
            return route('admin.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 2) {
            return route('user-dashboard.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 3) {
            return route('partner-dashboard.dashboard');
        }

//        return redirect()->back();
    }



}
