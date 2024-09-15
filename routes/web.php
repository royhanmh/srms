<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ClassesController;
use App\Http\Controllers\Backend\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin.index');
})
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');
//Admin All Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'AdminLogout')->name('admin.logout');
    Route::get('admin/profile', 'AdminProfile')->name('admin.profile');
    Route::post('admin/profile', 'AdminProfileUpdate')->name('admin.profile.update');
    Route::get('admin/password_change', 'AdminPasswordChange')->name('admin.password.change');
    Route::post('admin/password_change', 'AdminPasswordUpdate')->name('admin.password.update');
});
//Classes All Routes
Route::controller(ClassesController::class)->group(function () {
    Route::get('admin/class/create', 'CreateClass')->name('create.class');
    Route::post('admin/class/store', 'StoreClass')->name('store.class');
    Route::get('admin/class/manage', 'ManageClass')->name('manage.class');
    Route::get('admin/class/edit/{id}', 'EditClass')->name('edit.class');
    Route::post('admin/class/update', 'UpdateClass')->name('update.class');
    Route::get('admin/class/delete/{id}', 'DeleteClass')->name('delete.class');
});
Route::controller(SubjectController::class)->group(function () {
    Route::get('admin/subject/create', 'CreateSubject')->name('create.subject');
    Route::post('admin/subject/store', 'StoreSubject')->name('store.subject');
    Route::get('admin/subject/manage', 'ManageSubject')->name('manage.subject');
    Route::get('admin/subject/edit/{id}', 'EditSubject')->name('edit.subject');
    Route::post('admin/subject/update', 'UpdateSubject')->name('update.subject');
    Route::get('admin/subject/delete/{id}', 'DeleteSubject')->name('delete.subject');

    // subject combination route
    Route::get('admin/subject/combination/add', 'AddSubjectCombination')->name('add.subject.combination');
    Route::post('admin/subject/combination/store', 'StoreSubjectCombination')->name('store.subject.combination');
    Route::get('admin/subject/combination/manage', 'ManageSubjectCombination')->name('manage.subject.combination');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
