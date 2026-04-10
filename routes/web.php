<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/download', [ProfileController::class, 'downloadImages'])->name('profile.download');

Route::middleware(['auth'])->group(function () {
    Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company/update', [CompanyController::class, 'update'])->name('company.update');
});
