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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Ostale admin rute, npr:
    // Route::resource('proizvodi', Admin\ProizvodController::class);
    // Route::resource('recepti', Admin\ReceptController::class);
    // Route::resource('blog', Admin\BlogController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    // ... ostale rute za admin, npr. proizvodi, recepti ...
});



require __DIR__.'/auth.php';
