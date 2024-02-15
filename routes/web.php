<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('crudStudent',[App\Http\Controllers\StudentController::class,'indexStudent']);
Route::get('crudStudent/createStudent',[App\Http\Controllers\StudentController::class,'createStudent']);
Route::post('crudStudent/createStudent',[App\Http\Controllers\StudentController::class,'storestudent']);
Route::get('crudStudent/{student}/editStudent',[App\Http\Controllers\StudentController::class,'edit']);
Route::put('crudStudent/{student}/editStudent',[App\Http\Controllers\StudentController::class,'updatestudent'])->name('crud.update');
Route::get('crudStudent/{id}/delete',[App\Http\Controllers\StudentController::class,'destroystudent']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

