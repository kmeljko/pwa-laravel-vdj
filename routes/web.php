<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProizvodController;

Route::get('/', [PublicController::class, 'index'])->name('pocetna');
Route::get('/kontakt', [PublicController::class, 'kontakt'])->name('kontakt');

Route::get('/proizvodi', [ProizvodController::class, 'index'])->name('proizvodi.index');
Route::get('/proizvodi/{id}', [ProizvodController::class, 'show'])->name('proizvodi.show');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::get('/dashboard', fn () => redirect()->route('admin.dashboard'))->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('proizvodi', App\Http\Controllers\Admin\ProizvodController::class)
        ->parameters(['proizvodi' => 'proizvod'])
        ->names('proizvodi');
});
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('recepti', App\Http\Controllers\Admin\ReceptController::class)
        ->parameters(['recepti' => 'recept'])
        ->names('recepti');

});
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('logovi', App\Http\Controllers\Admin\LogController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);
});




require __DIR__ . '/auth.php';
