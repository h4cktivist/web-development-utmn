<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('teams.index');
    });

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

    Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamController::class, 'store'])->name('teams.store');

    Route::get('teams/{id}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::patch('teams/{id}', [TeamController::class, 'update'])->name('teams.update');

    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    Route::patch('/teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');
    Route::delete('/teams/{id}/delete', [TeamController::class, 'delete'])->name('teams.delete');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::post('/teams/{team}/games', [GameController::class, 'store'])->name('teams.matches.store');

    Route::get('/users/profile', [UserController::class, 'show'])->name('user.show');
    Route::post('/generate-token', [UserController::class, 'generateToken']);

    Route::post('/users/{user}/add-friend', [UserController::class, 'addFriend'])->name('users.addFriend');
    Route::delete('/users/{user}/remove-friend', [UserController::class, 'removeFriend'])->name('users.removeFriend');

    Route::get('/friends/teams', [FriendController::class, 'index'])->name('friends.teams.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
