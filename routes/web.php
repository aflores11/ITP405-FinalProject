<?php

use App\Http\Controllers\SmiteAPI;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/gods', function () {
    return view('characters.show');
})->name('gods');



