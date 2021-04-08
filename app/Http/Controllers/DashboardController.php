<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{
    /**
     * This is the landing page for the backend user.
     *
     * Shows the respective dashboard depending upon user role. If not, redirect to login.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //login if they have valid JWT token
        try {
            if ($request->get('token')) {
                if ($jwtAuth = JWTAuth::parseToken()) {
                    $user = $jwtAuth->authenticate();
                    if ($user->id && $user->verified) {
                        Auth::loginUsingId($user->id);
                    }
                }
            }
        } catch (\Exception $exception) {
            //do nothing
        }

        if (Auth::user() && Auth::user()->role->id === 1) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 2) {
            return redirect()->route('user-dashboard.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 3) {
            return redirect()->route('partner-dashboard.dashboard');
        }

        return redirect()->route('login');
    }

}
