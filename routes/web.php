<?php

use App\Http\Controllers\subjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('login');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');




//userManagement
Route::post('adduser', [userController::class,'store'])->name('adduser');
Route::get('users', [userController::class,'index'])->name('users');

//subjectManagement
Route::post('addSubject', [subjectsController::class, 'store'])->name('addSubject');
Route::get('subjects', [subjectsController::class, 'index'])->name('subjects');

