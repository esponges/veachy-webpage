<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github ()
    {
        // send the users requests to github
        return Socialite::driver('github')->redirect();

    }

    public function githubRedirect ()
    {
        // get oauth request back from github
        $user = Socialite::driver('github')->stateless()->user();

        // register if not existing in DB

        $user = User::firstOrNew([
            'email' => $user->email
        ], [
            'name' => ($user->name = null ? $user->name : $user->nickname ),
            'password' => Hash::make(Str::random(24)),
            'role' => 0
        ]);

        Auth::login($user, true);


        if (\Cart::getTotal() == 0.0) {
            return redirect('/');
        }

        return redirect('/cart');
    }

    public function facebook ()
    {
        // send the users requests to github
        return Socialite::driver('facebook')->redirect();

    }

    public function facebookRedirect ()
    {
        // get oauth request back from github
        $user = Socialite::driver('facebook')->stateless()->user();

        $name_real = $user->name;
        $role = 0;

        // register if not existing in DB

        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' =>  $name_real,
            'password' => Hash::make(Str::random(24)),
            'role' => 0
        ]);

        Auth::login($user, true);

        if (\Cart::getTotal() == 0.0) {
            return redirect('/');
        }

        return redirect('/cart');
    }

}
