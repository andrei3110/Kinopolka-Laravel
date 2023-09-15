<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RatingController;
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


Route::get('/', [ItemsController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/items/create', [ItemsController::class, 'create'])->name('items.create');
Route::get('/genre/create', [ItemsController::class, 'genre_create'])->name('genre.create');
Route::get('/categories/{id}', [CategoriesController::class, 'categories']);
Route::get('/description/{id}', [DescriptionController::class, 'description'])->name('description');
// Route::post('/rating/{id}', [RatingController::class, 'rating']);
// Route::get('/rating_update/{id}', [RatingController::class, 'update']);
Route::post('/store', [ItemsController::class, 'store'])->name('items.store');
Route::post('/genre/store', [ItemsController::class, 'genre_store'])->name('genre.store');
Route::post('/filter', [CategoriesController::class, 'filter'])->name('filter');
Route::get('/filter/view', [CategoriesController::class, 'filter_view'])->name('filter.view');
require __DIR__.'/auth.php';