<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function() {
    Route::resource('/category', CategoryController::class)
        ->except('show');
    Route::resource('/item', ItemController::class);
    // soft delete related routes
    Route::controller(ItemController::class)->group(function() {
        Route::post('/item/restore/{id}', 'restore')->name('item.restore');
        Route::post('/item/forceDelete/{id}', 'forceDelete')->name('item.forceDelete');
        Route::post('/item/emptyBin', 'emptyBin')->name('item.emptyBin');
        Route::post('/item/recycleBin', 'recycleBin')->name('item.recycleBin');
    });
    Route::resource('/income', IncomeController::class);
    Route::resource('/expense', ExpenseController::class);
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