<?php

use App\Http\Controllers\HomeController;
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
//index create store edit update destroy
Route::resources(['/' => HomeController::class]);
Route::post('/verifyCedula', [HomeController::class, 'verifyCedula'])->name("verifyCedula");
Route::get('/{id}', [HomeController::class, 'show'])->name("show");
Route::get('/{id}/edit', [HomeController::class, 'edit'])->name("edit");
Route::patch('/{id}', [HomeController::class, 'update'])->name("update");
Route::delete('/{id}', [HomeController::class, 'destroy'])->name("destroy");
Route::get('/export/data/{id}', [HomeController::class, 'export'])->name("export");
Route::get('/export/excel', [HomeController::class, 'excel'])->name("excel");