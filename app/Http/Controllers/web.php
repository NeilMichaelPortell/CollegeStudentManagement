<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

//routes for students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


//routes for colloge
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index'); 
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create'); 
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');
Route::put('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');
Route::delete('/colleges/{id}', [CollegeController::class, 'destroy'])->name('colleges.destroy');