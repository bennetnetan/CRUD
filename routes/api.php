<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('create');

Route::post('/employees/store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('store');

Route::put('/employees/update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update');

Route::put('/employees/delete/{$id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('delete');
