<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
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

Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('destinations', function () {
        return view('admin.destinations');
    })->name('destinations');

    Route::get('routes', function () {
        return view('admin.routes');
    })->name('routes');

    Route::get('buses', function () {
        return view('admin.buses');
    })->name('buses');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('booking', [BookingController::class, 'show'])->name('booking');
});
