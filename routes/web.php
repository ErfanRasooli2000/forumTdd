<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix("threads")->group(function () {
    Route::get("/" , [ThreadController::class , 'index'])->name('thread.all');
    Route::get("/{chanel:slug}/{thread}" , [ThreadController::class , 'show'])->name('thread.show');
    Route::post("/{thread}/replies" , [ReplyController::class , 'store'])->middleware("auth");
    Route::post("/create" , [ThreadController::class , 'create'])->name('thread.create')->middleware("auth");
});
