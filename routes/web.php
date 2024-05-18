<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('is_admin')->group(function() {
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    // Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    // Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    // Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    // Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    // Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    // Route::patch('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Route::prefix('admin')->as('admin.')->group(function() {
    //     Route::resource('posts', PostController::class);
    //     Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // });

    Route::prefix('admin')->as('admin.')->group(function() {
        Route::resource('posts', PostController::class);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::post('profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
        Route::resource('users', UserController::class);

    });





});

require __DIR__.'/auth.php';
