<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tickets', [AdminController::class, 'tickets'])->name('admin.tickets');
    Route::post('/admin/tickets/assign', [AdminController::class, 'assignTicket'])->name('admin.tickets.assign');
});

Route::middleware(['auth', 'role:developer'])->group(function () {
    Route::get('/developer', [DeveloperController::class, 'index'])->name('developer.dashboard');
    Route::post('/developer/tickets/update', [DeveloperController::class, 'updateTicket'])->name('developer.tickets.update');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/client/tickets', [ClientController::class, 'tickets'])->name('client.tickets');
    Route::post('/client/tickets/create', [ClientController::class, 'createTicket'])->name('client.tickets.create');
});