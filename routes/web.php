<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MachineEntryController;
Route::get('/', function () {
    return view('welcome');
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
Route::get('/admin/dashboard',[HomeController::class,'index'])
->middleware(['auth','admin'])
->name('admin.dashboard');
Route::get('/admin/create',[AdminController::class,'create'])

// Route for showing the form to create a new machine entry
->middleware(['auth','admin'])
->name('admin.create');
Route::post('/admin/store',[AdminController::class,'store'])
->middleware(['auth','admin'])
->name('machines.store');
Route::get('/admin/sertissage',[AdminController::class,'index'])
->middleware(['auth','admin'])
->name('admin.sertissage');
// Route for showing the form to create a new machine entry
Route::get('/machineEntries/create', [MachineEntryController::class, 'create'])
    ->middleware('auth')
    ->name('machineEntries.create'); // Name of the route
Route::post('/machineEntries/store', [MachineEntryController::class, 'store'])
    ->middleware('auth')
    ->name('machineEntries.store'); // Name of the route