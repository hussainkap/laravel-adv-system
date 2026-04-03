<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CaseController, ClientController, DashboardController};
use App\Http\Controllers\{ProfileController, RegisterController};

Route::get('/', function () {
    return view('welcome');
});



route::controller(RegisterController::class)->group(function () {
    route::get('/register', 'showRegistrationForm')->name('register');
    route::post('/register', 'register');
});












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});




Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('cases', CaseController::class);
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');