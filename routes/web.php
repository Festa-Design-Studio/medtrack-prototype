<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\MedicationTracker;
use App\Livewire\VitalsLogger;

Route::get('/', function () {
    return view('welcome');
});

// Test route for components
Route::get('/test-components', function () {
    return view('test-components');
})->name('test-components');

// Dashboard route - using view template to work with Laravel Breeze layouts
Route::get('/dashboard', function () {
    return view('dashboard-livewire');
})->middleware(['auth', 'verified'])->name('dashboard');

// MedTrack routes
Route::middleware('auth')->group(function () {
    Route::get('/medications', function () {
        return view('medications-livewire');
    })->name('medications');
    
    Route::get('/vitals', function () {
        return view('vitals-livewire');
    })->name('vitals');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
