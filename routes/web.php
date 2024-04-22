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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("threads")->group(function () {
    Route::get("/" , [\App\Http\Controllers\ThreadController::class , 'index']);
    Route::get("/{thread}" , [\App\Http\Controllers\ThreadController::class , 'show']);
    Route::post("/{thread}/replies" , [\App\Http\Controllers\ReplyController::class , 'store'])->middleware("auth");
});
