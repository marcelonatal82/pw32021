<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    //
    public  function  redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function  handleGitHubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        if ($this->loginOrRegister($user)){
            return redirect()->route('dashboard');
        };
    }

    private function loginOrRegister($data){
        $user = User::where('email', '=', $data->email)->first();

        if(!$user){
            $user = User::create([
                'name'=> $data->nickname,
                'avatar'=> $data->avatar,
                'email' => $data->email,
                'password' => ''
            ]);
        }

        Auth::login($user,true);

        return redirect()->route('dashboard');
    }
}
/*ATENCAO PAREI NO MINUTO 33:49 DO VIDEO DO RENATO*/
