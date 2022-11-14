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
            // redirect the user to home page, the anchor # is 
            // to overwrite #_=_ anchor added by facebook
            return redirect('/#')->with('success', 'Welcome ' . $user->getName() . '. You have been successfully logged in. Please continue to browse our catalogue below.');
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

}