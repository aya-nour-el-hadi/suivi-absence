<?php
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CEFController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;

    Route::get('/stagiaires', [StagiaireController::class, 'index'])->name('stagiaire.index');
    Route::get('/stagiaires/create', [StagiaireController::class, 'create'])->name('stagiaire.create');
    Route::post('/stagiaires', [StagiaireController::class, 'store'])->name('stagiaire.store');
    Route::get('/stagiaires/{stagiaire}/edit', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
    Route::put('/stagiaires/{stagiaire}', [StagiaireController::class, 'update'])->name('stagiaire.update');
    Route::delete('/stagiaires/{stagiaire}', [StagiaireController::class, 'destroy'])->name('stagiaire.destroy');
    
    Route::get('/absences', [AbsenceController::class, 'index'])->name('absence.index');
    Route::get('/absences/create',[AbsenceController::class,'create'])->name('absence.create');
    Route::get('/absences/{absence}/edit',[AbsenceController::class,'edit'])->name('absence.edit');
    Route::post('/absences', [AbsenceController::class, 'store'])->name('absence.store');
    Route::put('/absences/{absence}', [AbsenceController::class, 'update'])->name('absence.update');
    Route::delete('/absences/{absence}', [AbsenceController::class, 'destroy'])->name('absense.destroy');

    Route::get('/cefs', [CEFController::class, 'index'])->name('CEF.index');
    Route::put('/cefs/{cef}', [CEFController::class, 'update'])->name('CEF.update');
    
/* SANCTIONS */

Route::get('/sanctions', [SanctionController::class, 'index'])->name('sanction.index');

Route::get('/sanctions/create', [SanctionController::class, 'create'])->name('sanction.create');

Route::post('/sanctions', [SanctionController::class, 'store'])->name('sanction.store');

Route::get('/sanctions/{sanction}/edit', [SanctionController::class, 'edit'])->name('sanction.edit');

Route::put('/sanctions/{sanction}', [SanctionController::class, 'update'])->name('sanction.update');

Route::delete('/sanctions/{sanction}', [SanctionController::class, 'destroy'])->name('sanction.destroy');
    
    // Route::get('/dashboard', [DashboardController::class, 'index']);