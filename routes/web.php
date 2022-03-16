<?php

use App\Http\Controllers\{FavoritesController,
    PostController,
    ReplyController,
    ProfileController,
    SubscriptionController,
    UserController,
    UserNotificationController
};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
auth()->loginUsingId(1);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{category:slug}/{post:slug}', [PostController::class, 'show']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('confirmed-email');
Route::get('/posts/{category:slug}/{post:slug}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{category:slug}/{post:slug}', [PostController::class, 'update']);
Route::delete('/posts/{category:slug}/{post:slug}', [PostController::class, 'destroy'])->middleware('auth');;
Route::get('/posts/{category:slug}', [PostController::class, 'index']);


Route::get('/{post:slug}/replies', [ReplyController::class, 'index']);
Route::post('/posts/{category:slug}/{post:slug}/reply', [ReplyController::class, 'store']);
Route::patch('/replies/{reply}', [ReplyController::class, 'update'])->middleware('auth');

Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store'])->name('favorite')->middleware('auth');
Route::delete('/replies/{reply}/favorites', [FavoritesController::class, 'destroy'])->middleware('auth');
Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->middleware('auth');

Route::get('/profile/{user}', ProfileController::class)->middleware('auth');
Route::get('/profile/{user}/notification', [UserNotificationController::class, 'index'])->middleware('auth');
Route::delete('/profile/{user}/notification/{notification}', [UserNotificationController::class, 'destroy'])->middleware('auth');

Route::post('/posts/{category:slug}/{post:slug}/subscribe', [SubscriptionController::class, 'store'])->middleware('auth');
Route::delete('/posts/{category:slug}/{post:slug}/unsubscribe', [SubscriptionController::class, 'destroy'])->middleware('auth');

Route::get('register/users/{user}/verify', [UserController::class, 'verify']);
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

Route::get('secret-report', function () {
    return "here is the report";
})->middleware('can:view_report');
