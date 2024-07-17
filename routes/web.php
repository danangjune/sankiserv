<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});
Route::get('/sop', function () {
    return view('sop');
});
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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermohonanVidconController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/permohonan-vidcon', [PermohonanVidconController::class, 'index'])->name('permohonan-vidcon');

    Route::patch('/permohonan-vidcon/{id}/proses', [PermohonanVidconController::class, 'prosesVidcon'])->name('permohonan-vidcon.proses');
    Route::patch('/permohonan-vidcon/{id}/selesai', [PermohonanVidconController::class, 'selesaiVidcon'])->name('permohonan-vidcon.selesai');
});

Route::get('/vidcon/create', [PermohonanVidconController::class, 'create'])->name('vidcon.create');
Route::post('/vidcon/store', [PermohonanVidconController::class, 'store'])->name('vidcon.store');
Route::get('/vidcon/download-pdf', [PermohonanVidconController::class, 'download_pdf'])->name('vidcon.download_pdf');
Route::get('/vidcon/download', [PermohonanVidconController::class, 'download'])->name('vidcon.download');
