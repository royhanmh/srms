<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin.index');
})
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'AdminLogout')->name('admin.logout');
    Route::get('admin/profile', 'AdminProfile')->name('admin.profile');
    Route::post('admin/profile', 'AdminProfileUpdate')->name('admin.profile.update');
    Route::get('admin/password_change', 'AdminPasswordChange')->name('admin.password.change');
    Route::post('admin/password_change', 'AdminPasswordUpdate')->name('admin.password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
