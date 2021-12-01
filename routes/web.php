<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LegalitasController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PaklaringController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\ReimburstmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Payroll;
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
Route::resource('assets', AssetController::class);
Route::resource('partnerships', PartnershipController::class);
Route::resource('legalitas', LegalitasController::class);
Route::resource('paklarings', PaklaringController::class);
Route::resource('rab', RabController::class);
Route::resource('reimburstment', ReimburstmentController::class);
Route::resource('bpjs', BpjsController::class);
Route::resource('cooperation', CooperationController::class);
Route::resource('payroll', PayrollController::class);
Route::post('/rab/confirm/{id}', [RabController::class, 'confirm'])->name('rab.confirm');
Route::get('/rab/download/{id}', [RabController::class, 'download'])->name('rab.download');
Route::post('/journal/confirm/{id}', [JournalController::class, 'confirm'])->name('journal.confirm');
Route::get('/journal/download/{id}', [JournalController::class, 'download'])->name('journal.download');
Route::post('/cooperation/confirm/{id}', [CooperationController::class, 'confirm'])->name('cooperation.confirm');
Route::get('/cooperation/download/{id}', [CooperationController::class, 'download'])->name('cooperation.download');
Route::post('/bpjs/confirm/{id}', [BpjsController::class, 'confirm'])->name('bpjs.confirm');
Route::get('/bpjs/download/{id}', [BpjsController::class, 'download'])->name('bpjs.download');
Route::post('/paklaring/confirm/{id}', [PaklaringController::class, 'confirm'])->name('paklaring.confirm');
Route::get('/paklaring/download/{id}', [PaklaringController::class, 'download'])->name('paklaring.download');