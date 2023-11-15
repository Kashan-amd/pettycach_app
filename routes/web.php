<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/types', [TypeController::class,'index'])->name('type.index');
    Route::post('/types/store', [TypeController::class,'store'])->name('type.store');
    Route::get('/types/delete/{id}', [TypeController::class,'delete'])->name('type.delete');

    Route::get('/history', [HistoryController::class,'index'])->name('history.index');
    Route::get('delete/{id}', [HistoryController::class,'destroy'])->name('delete');
    Route::get('/export-excel', [HistoryController::class,'exportExcel'])->name('export.excel');

    Route::get('/pettycash', [PettyCashController::class,'index'])->name('index');
    Route::post('store', [PettyCashController::class,'store'])->name('store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
