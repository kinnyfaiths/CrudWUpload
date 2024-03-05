<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/updatePost/{id}', [PostController::class, 'updatePost']);

Route::put('/doUpdatePost/{id}', [PostController::class, 'doUpdatePost']);

Route::post('/createPost', [PostController::class, 'createPost']);
Route::delete('/deletePost/{id}', [PostController::class, 'deletePost']);
