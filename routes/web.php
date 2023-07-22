<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CrmController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(CustomAuthController::class)->group(function () {
    //login
    Route::get('login', 'login')->middleware('AlreadyLoggedIn');
    Route::post('login', 'loginUser')->name('login-user');
    //logout
    Route::get('logout', 'logout');
});


Route::middleware(['isLoggedIn'])->group(function () {

    Route::controller(CrmController::class)->group(function () {

        //dashboard
        Route::get('/', 'index');
        Route::get('dashboard', 'index');

        //payment
        Route::get('payment', 'payment');
        Route::post('charge', 'charge');

    });

});
