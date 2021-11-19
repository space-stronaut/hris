<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
})->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('office', OfficeController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('journal', JournalController::class);