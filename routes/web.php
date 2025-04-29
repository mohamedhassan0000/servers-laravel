<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Authentication Routes
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegester')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Server Management Routes
Route::middleware('auth')->controller(ServerController::class)->group(function () {
    Route::get('/servers', 'index')->name('servers.index');
    Route::get('/servers/create', 'create')->name('servers.create');
    Route::post('/servers', 'store')->name('servers.store');
    Route::get('/servers/{id}', 'show')->name('servers.show');
    Route::get('/servers/{id}/edit', 'edit')->name('servers.edit');
    Route::put('/servers/{id}', 'update')->name('servers.update');
    Route::delete('/servers/{id}', 'destroy')->name('servers.destroy');
});

// Note Management Routes
Route::middleware('auth')->post('/servers/{id}/notes', [NoteController::class, 'store'])->name('notes.store');
Route::middleware('auth')->get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::middleware('auth')->put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
Route::middleware('auth')->delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
