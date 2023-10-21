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

Route::get('/post' , [postController::class , 'getPost'])->name('post.show');