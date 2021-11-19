<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    //
    public  function  redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function  handleProviderCallback($provider){
        $user = Socialite::driver($provider)->stateless()->user();
        if ($this->loginOrRegister($user)){
            return redirect()->route('dashboard');
        };
    }

    //
//    public  function  redirectToGoogle(){
//        return Socialite::driver('google')->redirect();
//    }
//
//    public function  handleGoogleCallback(){
//        $user = Socialite::driver('google')->stateless()->user();
//        if ($this->loginOrRegister($user)){
//            return redirect()->route('dashboard');
//        };
//    }
//    //
//    public  function  redirectToGithub(){
//        return Socialite::driver('github')->redirect();
//    }
//
//    public function  handleGitHubCallback(){
//        $user = Socialite::driver('github')->stateless()->user();
//        if ($this->loginOrRegister($user)){
//            return redirect()->route('dashboard');
//        };
//    }
//
//
//    public  function  redirectToFacebook(){
//        return Socialite::driver('facebook')->redirect();
//    }
//
//    public function  handleFacebookCallback(){
//        $user = Socialite::driver('facebook')->stateless()->user();
//        if ($this->loginOrRegister($user)){
//            return redirect()->route('dashboard');
//        };
//    }

    private function loginOrRegister($data){
        $user = User::where('email', '=', $data->email)->first();

        if(!$user){
            if ($data->nickname != null){
                $user = User::create([
                    'name'=> $data->nickname,
                    'avatar'=> $data->avatar,
                    'email' => $data->email,
                    'password' => ''
                ]);
            }else{
                $user = User::create([
                    'name'=> $data->name,
                    'avatar'=> $data->avatar,
                    'email' => $data->email,
                    'password' => ''
                ]);
            }

        }

        Auth::login($user,true);

        return redirect()->route('dashboard');
    }
}
/*ATENCAO PAREI NO MINUTO 31:20 DO VIDEO DO RENATO*/
