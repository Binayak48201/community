<?php

use App\Http\Controllers\{FavoritesController, PostController, ReplyController, CategoryController, ProfileController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/posts/desce', [PostController::class, 'desce']);
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{category:slug}/{post:slug}', [PostController::class, 'show']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::match(['put','patch'],'/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{category:slug}/{post:slug}', [PostController::class, 'destroy'])->name('posts.delete');
// Route::patch('/posts/{category:slug}/{post:slug}', [PostController::class, 'update']);
Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::delete('/posts/{category:slug}/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');;
Route::get('/posts/{category:slug}', [PostController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
// Route::post('/category', [CategoryController::class, 'store']);
Route::match(['put', 'patch'], '/category/{category:slug}', [CategoryController::class, 'update']);
Route::post('/posts/{category:slug}/{post:slug}/reply', [ReplyController::class, 'store'])->name('posts.reply');
Route::get('/posts/{category:slug}/{post:slug}/edit', [PostController::class, 'edit']);
// Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store'])->middleware('auth');
Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store'])->name('favorite')->middleware('auth');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
