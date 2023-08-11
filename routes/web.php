<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/logins', [LoginsController::class, 'index'])->name('logins.index');
// Route::get('/logins/create', [LoginsController::class, 'create'])->name('logins.create');
// Route::post('/logins', [LoginsController::class, 'store'])->name('logins.store');
// Route::get('/logins/{login}', [LoginsController::class, 'show'])->name('logins.show');
// Route::get('/logins/{login}/edit', [LoginsController::class, 'edit'])->name('logins.edit');
// Route::put('/logins/{login}', [LoginsController::class, 'update'])->name('logins.update');
// Route::delete('/logins/{login}', [LoginsController::class, 'destroy'])->name('logins.destroy');

Route::resource('logins', LoginsController::class);