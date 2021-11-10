<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions/cars', [TransactionController::class, 'cars']);
    Route::get('/transactions/motorcycles', [TransactionController::class, 'motorcycles']);
    Route::apiResource('transactions', TransactionController::class)->except(['index', 'destroy']);
    Route::post('/logout/{parker}', [AuthController::class, 'logout']);
});