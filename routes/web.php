<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/add-recipe', [RecipeController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('recipes.create');

Route::post('/add-recipe', [RecipeController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('recipes.store');

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/recipes/{recipe}/comments', [CommentController::class, 'show'])->name('recipe-comments');

Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('recipes.comments.store');

Route::post('/recipes/{id}/rate', [RatingController::class, 'rateRecipe'])->middleware(['auth', 'verified'])->name('rate-recipe');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
