<?php
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CEFController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


    Route::middleware('guest')->group(function(){
       Route::get('/login',[LoginController::class,'show'])->name('login.show');
       Route::post('/login',[LoginController::class,'login'])->name('login');
    });

    Route::get('/',function () {
        if(auth()->check()) {
            return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login.show');
                }
                });

                Route::get('/google',function(){
                    return redirect()->away('https://www.google.com');
                });
                

    Route::middleware(['auth' , 'admin'])->group(function() {
        Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('stagiaires',StagiaireController::class); 
        Route::resource('absences',AbsenceController::class);
        Route::resource('cefs',CEFController::class);
        Route::resource('sanctions',SanctionController::class);
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    });