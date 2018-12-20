<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;
use DB;

class SocialAuthGoogleController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->affNum = 0;
                $user->activated = 2;
                $user->save();
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('main');
        } 
        catch (Exception $e) {
            echo "<pre>";
            return $e;
        }
    }
}
