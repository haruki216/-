<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\CalculationController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/',function(){return view('records.top');});
Route::get('/calender', [RecordController::class, 'index'])->name('records.index');
Route::post('/memo/{date}', [RecordController::class, 'memo'])->name('records.memo');
Route::get('/memo/{date}', [recordController::class, 'memo'])->name('records.memo');
Route::get('/timer',function(){return view('records.timer');});
Route::get('/calories', [CalculationController::class, 'index'])->name('records.calories');
Route::post('/calories', [CalculationController::class, 'store'])->name('records.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/api/record',[RecordController::class,'getRecord'] );
require __DIR__.'/auth.php';
