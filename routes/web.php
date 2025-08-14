<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\GradebookController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn() => redirect()->route('enrollment.index'));
    Route::resources([
        'students'    => StudentController::class,
        'subjects'    => SubjectController::class,
        'enrollment' => EnrollmentController::class,
        'submissions' => SubmissionController::class,
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/gradebook', [GradebookController::class, 'index'])->name('gradebook.index');
});