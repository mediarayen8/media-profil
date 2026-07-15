<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PublicController,
    DashboardController,
    PortfolioController,
    ProfileController,
    ExperienceController,
    SkillController,
    EducationController
};

// 1. RUTE AUTENTIKASI (Paling Atas)
require __DIR__.'/auth.php';

// 2. RUTE AREA ADMIN (Memerlukan Login)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('projects', PortfolioController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('educations', EducationController::class);
});

// 3. RUTE PUBLIK (Ditaruh di bawah agar tidak konflik)
Route::prefix('cv')->name('cv.')->group(function () {
    Route::get('/view/{userId}', [PublicController::class, 'viewCv'])->name('view');
    Route::get('/download/{userId}', [PublicController::class, 'downloadCv'])->name('download');
});

// 4. RUTE DINAMIS (HARUS PALING AKHIR)
// Ini adalah "catch-all route", jadi harus diletakkan paling bawah
Route::get('/{name}', [PublicController::class, 'index'])->name('profile.public');