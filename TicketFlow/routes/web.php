<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tickets = Ticket::where('client_id', auth()->id())->get();
    return view('dashboard', compact('tickets'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ticket routes
    Route::resource('tickets', TicketController::class);

    // Assignment routes
    Route::resource('assignments', AssignmentController::class);
});

require __DIR__.'/auth.php';