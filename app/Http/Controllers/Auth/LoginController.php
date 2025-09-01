<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirect to the appropriate dashboard based on the user's role
        if ($user->role === 'employer') {
            return redirect()->route('employer.dashboard'); // Redirect admins to admin dashboard
        }
        if ($user->role === 'developer') {
            return redirect()->route('developer.dashboard'); // Redirect admins to admin dashboard
        }

        // For non-admin users, redirect them to the home page
        return redirect()->route('login');
    }
}
