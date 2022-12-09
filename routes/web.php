<?php

use App\Http\Controllers\HomeController;
use App\Models\Employee;
use GuzzleHttp\Promise\Create;
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

Route::get('/home', [App\Http\Controllers\EmployeesController::class, 'index'])->name('home');

Route::get('/employees/create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('create');

Route::post('/employees/store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('store');

Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('edit');

Route::get('/employees/show', [App\Http\Controllers\EmployeesController::class, 'show'])->name('show');

Route::put('/employees/update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update');
