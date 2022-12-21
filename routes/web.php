<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
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

Route::group(['middleware' => ['auth']], function(){

// Display the home page view
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Populate the employee array with data from DB
Route::get('/home', [App\Http\Controllers\EmployeesController::class, 'index'])->name('home');

// Display the view that has the form to enter new records
Route::get('/employees/create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('create');

// To create a DB record of a new employee
Route::post('/employees/store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('store');

// To fetch the records by $id for editing
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('edit');

// To display the saved records for editing
Route::get('/employees/show', [App\Http\Controllers\EmployeesController::class, 'show'])->name('show');

// To update DB records of an employee
Route::put('/employees/update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update');

// To delete an employee by $id
Route::put('/employees/delete/{$id}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('delete');

//For adding an image
Route::get('/images/add_image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/images/store_image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/images/view_image',[ImageUploadController::class,'viewImage'])->name('images.view');

});
