<?php

namespace App\Http\Controllers\Auth;

use App\Events\CommonForgotPasswordEvent;
use App\Events\ForgotPasswordEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	/**
	 * Send a reset link to the given user.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	public function sendResetLinkEmail(Request $request)
	{
		$this->validateEmail($request);


		$user = User::where('email', $request->get('email'))->first();

		if ($user) {
			$user->fill([
				'forgot_password_token'             => md5(uniqid(rand(), true)),
				'forgot_password_token_expiry_date' => Carbon::now()->addDay(1),
			])->save();

			event(new CommonForgotPasswordEvent($user));
		}

		return back()->with('status', trans('Reset password email has been sent to your email. Please follow the link to reset your email.'));
	}

}
