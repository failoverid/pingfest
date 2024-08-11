<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome2');
});

// Route untuk Dashboard utama
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk Dashboard IT-Venture
Route::get('/it-venture', function () {
    return view('it-venture');
})->name('it-venture');

Route::get('/semnas', function () {
    return view('semnas');
})->name('semnas');

Route::get('/pendaftaran-cp', function () {
    return view('pendaftaran_cp');
})->middleware(['auth', 'verified'])->name('pendaftaran_cp');

Route::get('/pendaftaran-bot', function () {
    return view('pendaftaran_bot');
})->middleware(['auth', 'verified'])->name('pendaftaran_bot');

Route::get('/pendaftaran-ml', function () {
    return view('pendaftaran_ml');
})->middleware(['auth', 'verified'])->name('pendaftaran_ml');

// Route untuk Dashboard SemNas
Route::get('/semnas/dashboard', function () {
    return view('semnas.dashboard');
})->middleware(['auth', 'verified'])->name('semnas.dashboard');

// Route untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk Registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('pendaftaran-cp/', [PendaftaranController::class, 'submit_cp']);
Route::post('pendaftaran-bot/', [PendaftaranController::class, 'submit_bot']);
Route::post('pendaftaran-ml/', [PendaftaranController::class, 'submit_ml']);

require __DIR__.'/auth.php';
