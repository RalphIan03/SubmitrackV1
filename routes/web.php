<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('login');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('users', function(){
    return view('users');
})->name('users');

Route::get('subjects', function(){
    return view('subjects');
})->name('subjects');

Route::post('adduser', [userController::class,'store'])->name('adduser');
