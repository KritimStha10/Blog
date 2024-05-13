<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', [HomeController::class, 'index']);
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->middleware('XssSanitizer');
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'super-admin','middleware' => ['auth']], function () {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('', [HomeController::class, 'index']);


    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts/{id}', [PostController::class, 'show']);
    Route::get('posts/{id}/edit', [PostController::class, 'edit']);
    Route::post('posts/{id}', [PostController::class, 'update']);
    Route::get('posts/delete/{id}', [PostController::class, 'destroy']);

    Route::get('news', [NewsController::class, 'index']);
    Route::get('news/create', [NewsController::class, 'create']);
    Route::post('news', [NewsController::class, 'store']);
    Route::get('news/{id}', [NewsController::class, 'show']);
    Route::get('news/{id}/edit', [NewsController::class, 'edit']);
    Route::post('news/{id}', [NewsController::class, 'update']);
    Route::get('news/delete/{id}', [NewsController::class, 'destroy']);


    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/create', [CategoryController::class, 'create']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('categories/{id}', [CategoryController::class, 'update']);
    Route::get('categories/delete/{id}', [CategoryController::class, 'destroy']);
});


