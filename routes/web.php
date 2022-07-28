<?php

use App\Http\Controllers\ParkerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Carbon;
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
    $time = Carbon::now();
    return redirect()->route('dashboard', ['year' => $time->year, 'month' => $time->month]);
})->name('index');
Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
Route::get('/export', [TransactionController::class, 'export'])->name('export');
Route::get('/parkers', [ParkerController::class, 'index'])->name('parker');
Route::get('/reports', [ReportController::class, 'index'])->name('report');
