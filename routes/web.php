<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsignmentController;
use App\Models\Consignment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    if ((Session::has('email'))) {
            return redirect('/dashboard');
    } else {
            return view('auth.Login');
    }
});
Route::get('/auth/signup', function () {
    if ((Session::has('email'))) {
        return redirect('/dashboard');
    } else {
            return view('auth.signup');
    }
});

Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/signup', 'signup')->name('signup');
    });
Route::controller(ConsignmentController::class)->group(function () {
    Route::get('/dashboard', 'getter')->name('getter');
    Route::post('/add_consigmnent', 'store')->name('store');
});
