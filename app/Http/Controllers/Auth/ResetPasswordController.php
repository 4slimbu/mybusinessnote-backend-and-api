<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

	/**
	 * Create a new controller instance.
	 *
	 */
    public function __construct()
    {
        $this->middleware('guest');
    }

	/**
	 * Reset the given user's password.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	public function reset(Request $request)
	{
		$this->validate($request, $this->rules(), $this->validationErrorMessages());

		$authUser = User::where('forgot_password_token', $request->get('token'))
						->where('email', $request->get('email'))
		                ->where('forgot_password_token_expiry_date', '>', Carbon::now())
		                ->first();

		if (!$authUser) {
			return redirect()->back()
				->with('status', trans('Something went wrong. Unable to reset your password'));
		}

		//save data
		$data = [
			'password'                          => $request->get('password'),
			'forgot_password_token'             => null,
			'forgot_password_token_expiry_date' => null,
		];

		$authUser->fill($data)->save();

		return redirect($this->redirectPath())
			->with('status', trans('Password reset successfully. Please login with your new password to continue.'));
	}
}
