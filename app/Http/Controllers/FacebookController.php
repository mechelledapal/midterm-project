<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();

            $user = User::where('facebook_id' , $facebook_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'google_id' => $facebook_user->getId()

                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');

            }
            else{
                Auth::login($user);

                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong!' . $th->getMessage());
        }
    }
}
