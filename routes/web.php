<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AlertSignalsController;
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

Route::get('/', [AlertSignalsController::class, 'index'])->name('alertSignals.index');
Route::get("setSignal/{id}", [AlertSignalsController::class, 'create'])->name("alertSignals.create");
Route::get("alerts/{id}/edit", [AlertSignalsController::class, "edit"])->name("alertSignals.edit");
Route::get("alerts/{id}", [AlertSignalsController::class, 'show'])->name("alertSignals.show");
Route::get("alerts", [AlertSignalsController::class, 'list'])->name("alertSignals.list");
Route::post("setSignal", [AlertSignalsController::class, "store"])->name("alertSignals.store");
Route::patch("alerts/{id}", [AlertSignalsController::class, "update"])->name("alertSignals.update");


Route::get('employees/cards', [EmployeeController::class, 'cards'])->name('employees.cards');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('employees/list', [EmployeeController::class, 'list'])->name('employees.list');
Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::patch('employees/{id}/notify', [EmployeeController::class, 'notify'])->name('employees.notify');
Route::patch('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('employess/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


