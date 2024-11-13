<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('team/{id}', [TeamController::class, 'show'])->name('teams.show');

Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('teams', [TeamController::class, 'store'])->name('teams.store');

Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::patch('team/{id}', [TeamController::class, 'update'])->name('teams.update');

Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
