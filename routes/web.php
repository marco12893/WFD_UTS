<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use App\Models\Flight;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/flights');
Route::get('/flights', [FlightController::class, 'index'])->name('index');
Route::get('/flights/ticket/{flight:id}', [FlightController::class, 'ticket'])->name('ticket');
Route::get('/flights/book/{flight:id}', [FlightController::class, 'book'])->name('book');
Route::post('/ticket/submit', [TicketController::class, 'submit'])->name('submit');
Route::put('/ticket/board/{ticket:id}', [TicketController::class, 'board'])->name('board');
Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('delete');
