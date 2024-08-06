<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [StudentController::class, 'index']);
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::get('/students/import', [StudentController::class, 'showImportForm']);
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
