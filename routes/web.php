<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'index'])->name('home');


Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');

<<<<<<< HEAD
Route::get('/ads/{ad}', [AdController::class,'show'])->name("ads.show");



=======
Route::get('/category/{category}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');

Route::get('/category/{category->name}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');
>>>>>>> 4b7a7b32f3e2448cbd49e5e89db652964fa7e309
