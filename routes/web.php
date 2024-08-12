<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SemnasPaymentController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Route untuk halaman utama yang dilindungi oleh auth dan verifikasi email
Route::get('/', function () {
    return view('welcome2');
});

// Route yang membutuhkan autentikasi dan verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {

    // Route untuk Dashboard utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route untuk Dashboard IT-Venture
    Route::get('/it-venture', function () {
        return view('it-venture');
    })->name('it-venture');

    // Route untuk Dashboard SemNas
    Route::get('/semnas/dashboard', function () {
        return view('semnas.dashboard');
    })->name('semnas.dashboard');

    // Route untuk pendaftaran berbagai acara
    Route::get('/pendaftaran-cp', function () {
        return view('pendaftaran_cp');
    })->name('pendaftaran_cp');

    Route::get('/pendaftaran-bot', function () {
        return view('pendaftaran_bot');
    })->name('pendaftaran_bot');

    Route::get('/pendaftaran-ml', function () {
        return view('pendaftaran_ml');
    })->name('pendaftaran_ml');

    // Route untuk mengunggah bukti pembayaran Semnas
    Route::get('/upload-payment', [SemnasPaymentController::class, 'showForm'])->name('semnas.payment.form');
    Route::post('/upload-payment', [SemnasPaymentController::class, 'uploadPayment'])->name('semnas.payment.upload');

    // Route untuk scan QR Code
    Route::get('/scan', [QrCodeController::class, 'scan']);
    Route::post('/scan', [QrCodeController::class, 'processScan']);
});

// Route untuk Profile (hanya membutuhkan autentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk Registrasi pengguna baru
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Route untuk submit pendaftaran acara
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('pendaftaran-cp/', [PendaftaranController::class, 'submit_cp']);
    Route::post('pendaftaran-bot/', [PendaftaranController::class, 'submit_bot']);
    Route::post('pendaftaran-ml/', [PendaftaranController::class, 'submit_ml']);
});

// Include routes untuk autentikasi (login, logout, dll.)
require __DIR__.'/auth.php';
