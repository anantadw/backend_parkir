<?php

use App\Http\Controllers\ParkerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [TransactionController::class, 'index'])->name('home');
Route::get('/export', [TransactionController::class, 'export'])->name('export');
Route::get('/parkers', [ParkerController::class, 'index'])->name('parker');
Route::get('/reports', [ReportController::class, 'index'])->name('report');
Route::get('/logs', [ParkerController::class, 'index'])->name('log');
