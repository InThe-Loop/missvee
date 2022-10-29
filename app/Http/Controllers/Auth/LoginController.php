<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        // Do your logic to flash data to session...
        session()->flash('message', 'success', 'Welcome, you have been successfully logged in. Please browse our product offerings below.');

        // Return the results of the method we are overriding that we aliased.
        return $this->redirectTo;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver(request()->provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $provider = request()->provider;
        $providerUser = Socialite::driver($provider)->user();
        if($providerUser->getEmail() == null) {
            $user = User::where($provider . '_id', $providerUser->getId())->first();
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();
        }
        if($user && $user->$provider . '_id' == null) {
            $user->update([$provider . '_id' => $providerUser->getId()]);
        }
        if(!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                $provider . '_id' => $providerUser->getId(),
            ]);
        }

        auth()->login($user, true);

        return redirect($this->redirectTo);

        // $user->token;
    }
}
