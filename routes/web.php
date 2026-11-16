<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FilmController,
    AuthController,
    KritikController,
};
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    FilmController as AdminFilmController,
    CastController as AdminCastController,
    GenreController as AdminGenreController,
    KritikController as AdminKritikController,
};

// ===== PUBLIC =====
Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');

// ===== AUTH =====
Route::middleware('guest')->group(function () {
    Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',    [AuthController::class, 'login'])->name('login.post');
    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

// ===== KOMENTAR (HARUS LOGIN) =====
Route::post('/movies/{film}/kritik', [KritikController::class, 'store'])
    ->middleware('auth')->name('kritik.store');

// ===== ADMIN =====
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('films',   AdminFilmController::class)->except('show');
        Route::resource('casts',   AdminCastController::class)->except('show');
        Route::resource('genres',  AdminGenreController::class)->except('show');

        Route::get('/kritiks', [AdminKritikController::class, 'index'])->name('kritiks.index');
        Route::delete('/kritiks/{kritik}', [AdminKritikController::class, 'destroy'])->name('kritiks.destroy');
    });