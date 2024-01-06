<?php

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

//route resource
Route::resource('/borrowers', \App\Http\Controllers\BorrowerController::class);
//route resource
Route::resource('/books', \App\Http\Controllers\BookController::class);
//route resource
Route::resource('/borrowings', \App\Http\Controllers\BorrowingController::class);


