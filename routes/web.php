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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/userDrivers', [App\Http\Controllers\UserDriversController::class, 'index'])->name('userDrivers');
Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback');
Route::get('/earnings', [App\Http\Controllers\EarningsController::class, 'index'])->name('earnings');
Route::get('/complaints', [App\Http\Controllers\ComplaintsController::class, 'index'])->name('complaints');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'profileUpdate'])->name('profileupdate');

Route::get('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('change_password');
Route::put('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'passwordUpdate'])->name('passwordUpdate');






Route::get('car-details/{id}', [App\Http\Controllers\CarDetailsController::class, 'index']);


//Route::post('/profile', 'UserController@update_Profile');

