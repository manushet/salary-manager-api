<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalaryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('employees', EmployeeController::class)->only([
    'store'
]);

Route::apiResource('payments', PaymentController::class)->only([
    'store'
]);

Route::apiResource('salary/pay', SalaryController::class)->only([
    'store'
]);

Route::apiResource('salary/unpaid', SalaryController::class)->only([
    'index'
]);