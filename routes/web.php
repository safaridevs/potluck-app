<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PotluckController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/potlucks', [PotluckController::class, 'index'])->name('potlucks.index');
Route::get('/potlucks/create', [PotluckController::class, 'create'])->name('potlucks.create');
Route::post('/potlucks', [PotluckController::class, 'store'])->name('potlucks.store');
Route::get('/potlucks/{potluck}', [PotluckController::class, 'show'])->name('potlucks.show');
Route::get('/potlucks/{potluck}/edit', [PotluckController::class, 'edit'])->name('potlucks.edit');
Route::get('/potlucks/{potluck}/delete', [PotluckController::class, 'delete'])->name('potlucks.destroy');

// Items
Route::get('/potlucks/{potluck}/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/potlucks/{potluck}/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::middleware('auth')->group(function () {
    // Potlucks
    // Route::get('/potlucks', [PotluckController::class, 'index'])->name('potlucks.index');
    // Route::get('/potlucks/create', [PotluckController::class, 'create'])->name('potlucks.create');
    // Route::post('/potlucks', [PotluckController::class, 'store'])->name('potlucks.store');
    // Route::get('/potlucks/{potluck}', [PotluckController::class, 'show'])->name('potlucks.show');
    // Route::get('/potlucks/{potluck}/edit', [PotluckController::class, 'edit'])->name('potlucks.edit');
    // Route::get('/potlucks/{potluck}/delete', [PotluckController::class, 'delete'])->name('potlucks.destroy');

    // // Items
    // Route::get('/potlucks/{potluck}/items/create', [ItemController::class, 'create'])->name('items.create');
    // Route::post('/potlucks/{potluck}/items', [ItemController::class, 'store'])->name('items.store');
});
require __DIR__.'/auth.php';
