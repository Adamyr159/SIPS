<?php

use App\Http\Controllers\DownloadNilaiSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pending-notice', function () {
    return view('auth.pending-notice');
})->name('pending.notice');


Route::get('/download-pdf', [DownloadNilaiSiswaController::class, 'view_pdf'])->name('download-nilai-siswa');

