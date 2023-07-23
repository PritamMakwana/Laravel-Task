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

    //dashboard and payment
    Route::controller(CrmController::class)->group(function () {

        //dashboard
        Route::get('/', 'index');
        Route::get('dashboard', 'index');

        //payment
        Route::get('payment', 'payment');
        Route::post('charge', 'charge');

    });



    // company
    Route::controller(App\Http\Controllers\CompaniesController::class)->group(function () {

        //show
        Route::get('companies', 'index');
        // add
        Route::get('companies/create', 'create');
        Route::post('companies/create', 'createData');
        //edit
        Route::get('companies/{company_id}/edit','edit');
        Route::put('companies/{company_id}/edit','update');
        //delete
        Route::get('companies/{company_id}/delete','destroy');

    });

});
