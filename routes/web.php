<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
//*/
//
//Route::get('/', function () {
//  return redirect()->route('genres.index');
//});
//
//Route::get('/teste/{nome}', function ($nome){
//    return "<h1>Ola ".$nome."!</h1>";
//});
//
//Route::get('/soma/{n1}/{n2}', function ($n1, $n2){
//    return "<h1>A soma e: ".$n1+$n2."!</h1>";
//});

Route::get('/', function (){
    return view('admin.layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('admin.layout', \App\Http\Controllers\Controller::class)->middleware('auth');

Route::get('login/github',[\App\Http\Controllers\LoginSocialController::class,'redirectToGithub'])->name('login.github');
Route::get('login/github/callback',[\App\Http\Controllers\LoginSocialController::class,'handleGitHubCallback'])->name('login.github.callback');

Route::get('login/google',[\App\Http\Controllers\LoginSocialController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[\App\Http\Controllers\LoginSocialController::class,'handleGoogleCallback'])->name('login.google.callback');

Route::get('login/facebook',[\App\Http\Controllers\LoginSocialController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[\App\Http\Controllers\LoginSocialController::class,'handleFacebookCallback'])->name('login.facebook.callback');

Route::prefix('admin')->group(function (){
    Route::resource('genres', \App\Http\Controllers\GenreController::class);
    Route::resource('directors', \App\Http\Controllers\DirectorController::class);
    Route::resource('languages', \App\Http\Controllers\LanguageController::class);
    Route::resource('countries', \App\Http\Controllers\CountryController::class);
    Route::resource('movies', \App\Http\Controllers\MovieController::class);
});

Route::get('vitrine',[\App\Http\Controllers\VitrineController::class, 'index']);
Route::get('vitrine/{movie}', [\App\Http\Controllers\VitrineController::class, 'showmovie'])->name('vitrine.showmovie');

require __DIR__.'/auth.php';
