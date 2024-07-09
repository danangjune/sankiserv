<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
