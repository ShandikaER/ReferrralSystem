<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refer', [ReferralController::class, 'showReferralForm'])->name('refer.form');
Route::post('/refer', [ReferralController::class, 'refer'])->name('refer');

Route::get('/register', function () {
    return view('register');
})->name('register.form');

Route::post('/register', [ReferralController::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
