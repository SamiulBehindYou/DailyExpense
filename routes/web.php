<?php

use App\Http\Controllers\ExpanseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('auth/Login');
})->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::controller(ExpanseController::class)->group(function () {
        Route::get('expanses', 'index')->name('expanses.index');
        // Route::get('expanses/create', 'create')->name('expanses.create');
        // Route::post('expanses/store', 'store')->name('expanses.store');
        // Route::get('expanses/{id}/edit', 'edit')->name('expanses.edit');
        // Route::put('expanses/{id}', 'update')->name('expanses.update');
        // Route::delete('expanses/{id}', 'destroy')->name('expanses.destroy');
    });

});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
