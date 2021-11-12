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
*/

Route::get('/', function () {
    return view('admin.layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('admin.layout', \App\Http\Controllers\Controller::class)->middleware('auth');

Route::get('login/github',[\App\Http\Controllers\LoginSocialController::class,'redirectToGithub'])->name('login.github');
Route::get('login/github/callback',[\App\Http\Controllers\LoginSocialController::class,'handleGitHubCallback'])->name('login.github.callback');

Route::prefix('admin')->group(function (){
    Route::resource('genres', \App\Http\Controllers\GenreController::class)->middleware('auth');
    Route::resource('directors', \App\Http\Controllers\DirectorController::class)->middleware('auth');
    Route::resource('languages', \App\Http\Controllers\LanguageController::class)->middleware('auth');
    Route::resource('countries', \App\Http\Controllers\CountryController::class)->middleware('auth');
    Route::resource('movies', \App\Http\Controllers\MovieController::class)->middleware('auth');
});
require __DIR__.'/auth.php';
