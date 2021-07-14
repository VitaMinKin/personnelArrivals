<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('employees/list', [EmployeeController::class, 'list'])->name('employees.list');
Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::patch('employees/{id}/notify', [EmployeeController::class, 'notify'])->name('employees.notify');
Route::patch('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('employess/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


