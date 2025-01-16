<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pending-notice', function () {
    return view('auth.pending-notice');
})->name('pending.notice');
