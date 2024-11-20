<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\ProfileController;

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

Route::resource('books', bookController::class);
Route::get('/books/create', [bookController::class, 'create'])->name('books.create');
Route::delete('/books/{book}', [bookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{book}/edit', [bookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [bookController::class, 'update'])->name('books.update');


require __DIR__.'/auth.php';
