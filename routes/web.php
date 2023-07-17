<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;
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

Route::middleware(['isAdmin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->middleware('isAdmin')->name('admin.home');
    Route::patch('/admin/ad/{ad}/accept', [AdminController::class, 'acceptAd'])->middleware('isAdmin')->name('admin.ad.accept');
    Route::patch('/admin/ad/{ad}/reject', [AdminController::class, 'rejectAd'])->middleware('isAdmin')->name('admin.ad.reject');
});


Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');


Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.home');

Route::get('revisor/become', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('revisor.become');

Route::get('revisor/{user}/make', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('revisor.make');

Route::patch('/revisor/ad/{ad}/accept', [RevisorController::class, 'acceptAd'])->name('revisor.ad.accept');
Route::patch('/revisor/ad/{ad}/reject', [RevisorController::class, 'rejectAd'])->name('revisor.ad.reject');

Route::get('/ads/{ad}', [AdController::class,'show'])->name("ads.show");

Route::get('/category/{category:name}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');

Route::post('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.set');

