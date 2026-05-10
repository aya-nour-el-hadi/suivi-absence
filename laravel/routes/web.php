<?php
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CEFController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

  
       Route::get('/login',[LoginController::class,'show'])->name('login.show');
       Route::post('/login',[LoginController::class,'login'])->name('login');
  

        Route::get('/',function () {
            Auth::logout();
             if(auth()->check()) {
                 return redirect()->route('login.show');
             }else{
                return redirect()->route('admin.dashboard');
             };
                        
        }
        );

    Route::middleware(['auth' , 'admin'])->group(function() {
        Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
        Route::post('/logout',[LoginController::class,'logout'])->name('logout');
        Route::get('/user/show',[LoginController::class,'shows'])->name('user.shows');

        Route::get('/adminDashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::resource('stagiaires',StagiaireController::class); 
        Route::resource('absences',AbsenceController::class);
        Route::resource('cefs',CEFController::class);
        Route::resource('sanctions',SanctionController::class);
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    });

    