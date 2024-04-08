<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/chatBoard', [chatController::class, 'index'])->name('chatBoard');
Route::post('/chatBoard/store', [chatController::class, 'store'])->name('chatBoard.store');
Route::delete('/chatBoard/destroy', [chatController::class, 'destroy'])->name('chatBoard.destroy');