<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('categories.')->group(function () {
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->can('editCategory', 'category')->name('edit');
        Route::patch('/categories/{category}', [CategoryController::class, 'update'])->can('editCategory', 'category')->name('update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->can('editCategory', 'category')->name('destroy');
    });

    Route::name('media.')->group(function () {
        Route::get('/media/create', [MediaController::class, 'create'])->name('create');
        Route::post('/media', [MediaController::class, 'store'])->name('store');
        Route::get('/media/{media}/edit', [MediaController::class, 'edit'])->can('edit', 'media')->name('edit');
        Route::patch('/media/{media}', [MediaController::class, 'update'])->can('edit', 'media')->name('update');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])->can('edit', 'media')->name('destroy');
    });
});

require __DIR__.'/auth.php';
