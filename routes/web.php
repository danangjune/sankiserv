<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SopController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermohonanTTEController;
use App\Http\Controllers\Admin\PermohonanVidconController;
use App\Http\Controllers\Admin\BsopController;

// Front

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});
Route::get('/sop', [SopController::class, 'index'])->name('sop');
Route::get('/kontak', function () {
    return view('kontak');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/survey', function () {
    return view('survey');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin

<<<<<<< HEAD
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermohonanVidconController;
use App\Http\Controllers\Admin\SopController;
use App\Http\Controllers\Admin\PermohonanResetPasswordController;



=======
>>>>>>> bb216854a497e4a2c6b5fc28ce67468c59a9d429
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/permohonan-vidcon', [PermohonanVidconController::class, 'index'])->name('permohonan-vidcon');

    Route::get('/bsop', [BsopController::class, 'index'])->name('sop');

    Route::patch('/permohonan-vidcon/{id}/proses', [PermohonanVidconController::class, 'prosesVidcon'])->name('permohonan-vidcon.proses');
    Route::patch('/permohonan-vidcon/{id}/selesai', [PermohonanVidconController::class, 'selesaiVidcon'])->name('permohonan-vidcon.selesai');

    Route::get('/permohonan-reset-password', [PermohonanResetPasswordController::class, 'index'])->name('permohonan-reset-password');
});

Route::get('/vidcon/create', [PermohonanVidconController::class, 'create'])->name('vidcon.create');
Route::post('/vidcon/store-docx', [PermohonanVidconController::class, 'storeDocx'])->name('vidcon.storeDocx');

Route::post('/vidcon/store', [PermohonanVidconController::class, 'store'])->name('vidcon.store');
Route::get('/vidcon/download-pdf', [PermohonanVidconController::class, 'download_pdf'])->name('vidcon.download_pdf');
Route::get('/vidcon/download', [PermohonanVidconController::class, 'download'])->name('vidcon.download');

Route::get('/terbit-tte/create', [PermohonanTTEController::class, 'create'])->name('terbit-tte.create');
Route::post('/terbit-tte/store', [PermohonanTTEController::class, 'store'])->name('terbit-tte.store');
