<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\DashboardPlacesController;
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
    return view('components/mainContent');
})->name('home');

Route::get('/services/Individual', function () {
    return view('components/services');
})->name('ind');

Route::get('/user-profile', function () {
    return view('userProfile');
});

Route::get('/services/book-service', function(){
    return view('components/bookForm');
});

Route::get('/contact', function(){
    return view('contact');
});


Route::post('/contact', [OpinionController::class, 'create']);


// route for admin dashboard
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');

Route::resource('dashboard/users', 'App\Http\Controllers\DashboardUsersController');
Route::get('dashboard/users', 'App\Http\Controllers\DashboardUsersController@index')->name('dashboard.users');

Route::resource('dashboard/places', 'App\Http\Controllers\DashboardPlacesController');
Route::get('dashboard/places', 'App\Http\Controllers\DashboardPlacesController@index')->name('dashboard.places_index');

// register && login
Route::get('/#register', function(){return redirect('/#register');})->name('view_register')->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('verify-account', [RegisterController::class, 'verifyByEmailForm'])->name('verify.get')->middleware('auth');;
Route::get('verify-account/sendcode', [RegisterController::class, 'sendCodeVerify'])->middleware('auth');;
Route::post('verify-account', [RegisterController::class, 'verifyByEmail'])->name('verify.post')->middleware('auth');;

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

