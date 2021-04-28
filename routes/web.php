<?php

use App\Http\Controllers\SmiteAPI;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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
Route::get('/register',[RegistrationController::class, 'index'])-> name('registration.index');
Route::post('/register',[RegistrationController::class, 'register'])-> name('register');
Route::get('/login',[AuthController::class, 'loginForm'])-> name('auth.loginForm');
Route::post('/login',[AuthController::class, 'login'])-> name('auth.login');
Route::get('/profile',[ProfileController::class, 'index'])-> name('profile.index');
Route::post('/logout',[AuthController::class, 'logout'])-> name('auth.logout');

Route::get('/gods', function () {
    return view('characters.show');
})->name('gods');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');



