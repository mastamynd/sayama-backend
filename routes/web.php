<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('transactions')->group(function () {
    Route::get('/', 'App\Http\Controllers\TransactionController@index')->name('transactions.index');
    Route::get('/{id}', 'App\Http\Controllers\TransactionController@show')->name('transactions.show');
    Route::get('/check_referral/{id}', 'App\Http\Controllers\TransactionController@check_referral')->name('transactions.check_referral');
});

Route::prefix('members')->group(function () {
    Route::get('/', 'App\Http\Controllers\MemberController@index')->name('members.index');
    Route::get('/{id}', 'App\Http\Controllers\MemberController@show')->name('members.show');
});

Route::prefix('users')->group(function () {
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('users.index');
    Route::post('/', 'App\Http\Controllers\UserController@create')->name('users.create');
    Route::get('/{id}', 'App\Http\Controllers\UserController@show')->name('users.show');
});