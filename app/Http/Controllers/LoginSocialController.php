<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    //
    public  function  redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function  handleGitHubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        dd($user);
    }
}
/*ATENCAO PAREI NO MINUTO 33:49 DO VIDEO DO RENATO*/
