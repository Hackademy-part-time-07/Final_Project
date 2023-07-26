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
    Route::post('/admin/users/{user}/accept', [AdminController::class, 'acceptAd'])->name('admin.users.accept');
    Route::post('/admin/users/{user}/reject', [AdminController::class, 'rejectAd'])->name('admin.users.reject');
    Route::post('/admin/users/{user}/assign_reviewer', [AdminController::class, 'assignReviewer'])->name('admin.users.assign_reviewer');
    Route::post('/admin/users/{user}/remove_reviewer', [AdminController::class, 'removeReviewer'])->name('admin.users.remove_reviewer');
    Route::delete('/admin/delete/{user}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/ad/{ad}/accept', [AdminController::class, 'acceptAd'])->name('admin.ad.accept');
    Route::post('/admin/ad/{ad}/reject', [AdminController::class, 'rejectAd'])->name('admin.ad.reject');
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

Route::get('/search', [PublicController::class, 'search'])->name('search');

 Route::get('ad/search_results', [PublicController::class, 'ad.search_results'])->name('search_results');