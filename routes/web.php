<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/',[PostController::class, 'index'])->name('conduit.index');
Route::get('/post/index',[PostController::class, 'index'])->name('conduit.index');
Route::get('/post/create',[PostController::class, 'create'])->name('conduit.create');
Route::post('/post/store',[PostController::class, 'store'])->name('conduit.store');
Route::get('/post/{id}/article',[PostController::class, 'article'])->name('conduit.article');
Route::get('/post/{id}/edit',[PostController::class, 'edit'])->name('conduit.edit');
Route::put('/post/{id}',[PostController::class, 'update'])->name('conduit.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('conduit.destroy');
Route::get('/post/{post}/tag/{tag}/detach', [PostController::class, 'detachTag'])->name('conduit.detachTag');
