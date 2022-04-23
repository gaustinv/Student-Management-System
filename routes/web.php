<?php

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
Route::get('/addStudent', [App\Http\Controllers\HomeController::class, 'addStudent'])->name('addStudent');
Route::get('/addStudentEdit/{id}', [App\Http\Controllers\HomeController::class, 'addStudentEdit'])->name('addStudentEdit');
Route::get('/addStudentDelete/{id}', [App\Http\Controllers\HomeController::class, 'addStudentDelete'])->name('addStudentDelete');
Route::post('/addStudentInsert', [App\Http\Controllers\HomeController::class, 'addStudentInsert'])->name('addStudentInsert');
Route::post('/studentUpdate', [App\Http\Controllers\HomeController::class, 'studentUpdate'])->name('studentUpdate');

Route::get('/addStudentMark', [App\Http\Controllers\HomeController::class, 'addStudentMark'])->name('addStudentMark');
Route::get('/addStudentMarkEdit/{id}', [App\Http\Controllers\HomeController::class, 'addStudentMarkEdit'])->name('addStudentMarkEdit');
Route::get('/addStudentMarkDelete/{id}', [App\Http\Controllers\HomeController::class, 'addStudentMarkDelete'])->name('addStudentMarkDelete');
Route::post('/addStudentMarkInsert', [App\Http\Controllers\HomeController::class, 'addStudentMarkInsert'])->name('addStudentMarkInsert');
Route::post('/studentMarkUpdate', [App\Http\Controllers\HomeController::class, 'addStudentMarkUpdate'])->name('addStudentMarkUpdate');
