<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/create',[HomeController::class,'create'])->name('create');

Route::post('/store',[StudentController::class,'store'])->name('store');
Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::put('/update/{id}',[StudentController::class,'update'])->name('update');
Route::get('/delete/{id}',[StudentController::class,'destroy'])->name('delete');