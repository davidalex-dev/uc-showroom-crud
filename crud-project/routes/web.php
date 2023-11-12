<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SessionController::class, 'index']);
    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', [SessionController::class, 'login']);
});

Route::middleware(['auth'])->group(function(){

    Route::get('/logout', [SessionController::class, 'logout']);
    

    Route::get('/home', function(){
        return redirect('/user');
    });


    Route::resource('/vehicle',VehicleController::class);

    Route::resource('/user', CustomerController::class);

    Route::resource('/order', OrderController::class); 
});