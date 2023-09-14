<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\StudentsController;
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

Route::middleware('guest')->group(function(){
    Route::get('/register',[authController::class,'register']);
    Route::post('/register-success',[authController::class,'registerPost'])->name('register-success');
    Route::get('/login',[authController::class,'login'])->name('login');
    Route::post('/login',[authController::class,'loginPost'])->name('login-success');
});

Route::middleware('auth')->group(function(){
    Route::get('/home',[homeController::class,'home']);
    Route::get('/logout',[homeController::class,'logout']);
    
    Route::resource('/students',StudentsController::class);
    
    //read
    // Route::get('/students',[StudentsController::class,'index'])->name('students.index');

    // Route::get('students/create',[StudentsController::class,'create'])->name('students.create');
    // Route::post('students',[StudentsController::class,'store'])->name('students.store');
    // Route::get('students/{student}',[StudentsController::class,'show'])->name('students.show');

});

