<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PerformanceAssessmentController;
use App\Http\Controllers\laporanController;

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

Route::resource('employee', EmployeeController::class);
Route::post('/employee/EditForm', [EmployeeController::class, 'EditForm'])->name('employee.EditForm');

Route::resource('role', RoleController::class);
Route::post('/role/EditForm', [RoleController::class, 'EditForm'])->name('role.EditForm');

Route::resource('performance', PerformanceAssessmentController::class);

Route::get('laporanHarian', [LaporanController::class, 'laporanHarian'])->name('laporan.laporanHarian');
Route::post('/laporanHarian/searchByDate', [LaporanController::class, 'searchByDate'])->name('laporan.searchByDate');
