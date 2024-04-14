<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'index'])->name('conduit.index');
Route::get('/post/index', [PostController::class, 'index'])->name('conduit.index');
Route::get('/post/create', [PostController::class, 'create'])->name('conduit.create')->middleware('auth');
Route::post('/post/store', [PostController::class, 'store'])->name('conduit.store')->middleware('auth');
Route::get('/post/{id}/article', [PostController::class, 'article'])->name('conduit.article');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('conduit.edit');
Route::put('/post/{id}', [PostController::class, 'update'])->name('conduit.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('conduit.destroy');
Route::get('/post/{post}/tag/{tag}/detach', [PostController::class, 'detachTag'])->name('conduit.detachTag');
Route::get('/post/myfeed', [PostController::class, 'myFeed'])->name('conduit.myfeed')->middleware('auth');

require __DIR__.'/auth.php';
