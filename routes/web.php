<?php

use App\Http\Controllers\postController;
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

Route::get('/', [postController::class , 'index'])->name('home');

Route::get('/newPost' , [postController::class , 'addNewPost'])->name('post.add');

Route::post('/newPostCreate' , [postController::class , 'createNewPost'])->name('post.create');

Route::get('/post/{post}' , [postController::class , 'getPost'])->name('post.show');

Route::get('/post/{post}/edit' , [postController::class , 'editPost'])->name('post.edit');

Route::delete('/post/{post}/delete' , [postController::class , 'deletePost'])->name('post.delete');

Route::put('/post/{post}/update' , [postController::class , 'updatePost'])->name('post.update');