<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CEFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\StagiaireController;

// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
// });

// Route::middleware(['auth'])->group(function () {

    Route::get('/stagiaires', [StagiaireController::class, 'index'])->name('stagiaire.index');
    Route::get('/stagiaires/create', [StagiaireController::class, 'create'])->name('stagiaire.create');
    Route::post('/stagiaires', [StagiaireController::class, 'store'])->name('stagiaire.store');
    Route::get('/stagiaires/{id}/edit', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
    Route::put('/stagiaires/{id}', [StagiaireController::class, 'update'])->name('stagiaire.update');
    Route::delete('/stagiaires/{id}', [StagiaireController::class, 'destroy'])->name('stagiaire.destroy');

// });

// Route::middleware(['auth'])->group(function () {

    Route::get('/absences', [AbsenceController::class, 'index']);
    Route::post('/absences', [AbsenceController::class, 'store']);
    Route::put('/absences/{id}', [AbsenceController::class, 'update']);
    Route::delete('/absences/{id}', [AbsenceController::class, 'destroy']);

// });

// Route::middleware(['auth'])->group(function () {

    Route::get('/cefs', [CEFController::class, 'index']);
    Route::post('/cefs', [CEFController::class, 'store']);
    Route::put('/cefs/{id}', [CEFController::class, 'update']);
    Route::delete('/cefs/{id}', [CEFController::class, 'destroy']);

// });

// Route::middleware(['auth'])->group(function () {

    Route::get('/sanctions', [SanctionController::class, 'index']);
    Route::post('/sanctions', [SanctionController::class, 'store']);
    Route::put('/sanctions/{id}', [SanctionController::class, 'update']);
    Route::delete('/sanctions/{id}', [SanctionController::class, 'destroy']);

// });