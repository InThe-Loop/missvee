<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller {

    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook() {
        try {
            $user = Socialite::driver('facebook')->user();
            $saveUser = User::updateOrCreate([
                    'facebook_id' => $user->getId(),
                ],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]
            );
            
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('welcome')->with('success', 'Welcome ' . $user->getName() . '. You have been successfully logged in. Please browse our product offerings below.');
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

}