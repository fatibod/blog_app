<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\AlbumController;

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

Route::get('dashboard', [DashboardController::class,'index']);

Route::get('create-category', [CategoryController::class,'create']);

Route::post('post-category-form', [CategoryController::class,'store']);

Route::get('all-categories', [CategoryController::class,'index']);

Route::get('edit-category/{id}', [CategoryController::class, 'edit']);

Route::get('update-category-form/{id}', [CategoryController::class, 'update']);

Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);


// THINGS
Route::get('create-thing', [ThingController::class,'create']);
Route::post('post-thing-form', [ThingController::class,'store']);
Route::get('all-things', [ThingController::class,'index']);
Route::get('edit-thing/{id}', [ThingController::class, 'edit']);
Route::get('update-thing-form/{id}', [ThingController::class, 'update']);
Route::get('delete-thing/{id}', [ThingController::class, 'destroy']);

// BLOG POST
Route::get('create-blog-post', [BlogPostController::class,'create']);
Route::post('store-blog-post', [BlogPostController::class,'store']);
Route::get('all-blog-posts', [BlogPostController::class,'index']);
Route::get('edit-blog-post/{id}', [BlogPostController::class, 'edit']);
Route::post('update-blog-post/{id}', [BlogPostController::class, 'update']);
Route::get('delete-blog-post/{id}', [BlogPostController::class, 'destroy']);

// ALBUM
Route::get('create-album', [AlbumController::class,'create']);
Route::post('post-album-form', [AlbumController::class,'store']);
Route::get('all-album', [AlbumController::class,'index']);
Route::get('edit-album/{id}', [AlbumController::class, 'edit']);
Route::get('update-album-form/{id}', [AlbumController::class, 'update']);
Route::get('delete-album/{id}', [AlbumController::class, 'destroy']);