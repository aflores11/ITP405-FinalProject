<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SmiteAPI;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GodController;
use App\Http\Controllers\CommentController;

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

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}



Route::get('/', [SmiteAPI::class, 'motd'])->name('home');
Route::get('/random', [GodController::class, 'random'])->name('randomize');
Route::get('/register',[RegistrationController::class, 'index'])-> name('registration.index');
Route::post('/register',[RegistrationController::class, 'register'])-> name('register');
Route::get('/login',[AuthController::class, 'loginForm'])-> name('auth.loginForm');
Route::post('/login',[AuthController::class, 'login'])-> name('auth.login');
Route::get('/gods',[GodController::class, 'viewall'])->name('gods');
Route::get('/about', function () { return view('landing.about'); })->name('about');



Route::middleware(['custom-auth'])->group(function(){
    Route::middleware(['admin-privileges'])->group(function(){
        Route::get('/check', [SmiteAPI::class, 'check'])->name('check');
        Route::get('/block', [AdminController::class, 'block_page'])->name('blockPage');
        Route::post('/block', [AdminController::class, 'block_unblock_user'])->name('block-unblock');

    });

    Route::middleware(['not-blocked'])->group(function(){
        Route::get('/profile',[ProfileController::class, 'index'])-> name('profile.index');
        Route::get('/gods/{id}',[GodController::class, 'show'])->name('god');
        Route::post('/gods/{id}',[CommentController::class, 'handle_comment'])->name('handle_comment');
        Route::post('/gods',[GodController::class, 'fav'])-> name('favorite');

    });

    Route::post('/logout',[AuthController::class, 'logout'])-> name('auth.logout');
    Route::view('/blocked', 'profile.block')->name('blocked');
});




