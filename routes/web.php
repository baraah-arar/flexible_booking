<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\BookingController;
use App\Models\Place;

use App\Http\Controllers\DashboardPlacesController;
use App\Models\Opinion;

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

Route::get('/services/Individual', [BookingController::class, 'index'])->name('ind');
Route::get('/services/private', [BookingController::class, 'index']);
Route::get('/services/meeting', [BookingController::class, 'index']);


Route::get('/user-profile', function () {
    return view('userProfile');
});

Route::get('/services/book-service', function(){
    return view('components/bookForm');
});
// contact && send feedback
Route::get('/contact', function(){return view('contact');});
Route::post('/contact', [OpinionController::class, 'create']);


// route for admin dashboard
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');

Route::resource('dashboard/users', 'App\Http\Controllers\DashboardUsersController');
Route::get('dashboard/users', 'App\Http\Controllers\DashboardUsersController@index')->name('dashboard.users');

Route::resource('dashboard/places', 'App\Http\Controllers\DashboardPlacesController');
Route::get('dashboard/places', 'App\Http\Controllers\DashboardPlacesController@index')->name('dashboard.places_index');

Route::resource('dashboard/services', 'App\Http\Controllers\DashboardServicesController');
Route::get('dashboard/services', 'App\Http\Controllers\DashboardServicesController@index')->name('dashboard.services_index');

Route::resource('dashboard/opinions', 'App\Http\Controllers\DashboardOpinionsController');
Route::get('dashboard/opinions', 'App\Http\Controllers\DashboardOpinionsController@index')->name('dashboard.opinions_index');
Route::get('dashboard/author/{id}', 'App\Http\Controllers\DashboardUsersController@author')->name('author.opinions');


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

// book meeting service
Route::put('/services/meeting', [BookingController::class, 'checkAvailability'])->name('check');
Route::post('/services/meeting', [BookingController::class, 'create'])->name('book');
Route::patch('/services/meeting', [BookingController::class, 'createextraservice'])->name('extra.book');


// extras booking
Route::get('/services/extras', function(){
    return view('components/extras-modal');

});
