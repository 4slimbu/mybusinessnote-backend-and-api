<?php

namespace App\Http\Controllers;

use Auth;

class DashboardController extends Controller
{
    /**
     * This is the landing page for the backend user.
     *
     * Shows the respective dashboard depending upon user role. If not, redirect to login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->role->id === 1) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 2) {
            return redirect()->route('user-dashboard.dashboard');
        }
        if (Auth::user() && Auth::user()->role->id === 3) {
            return redirect()->route('partner-dashboard.dashboard');
        }
    }

}
