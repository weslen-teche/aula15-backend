<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('posts', 'API\PostAPIController')->only(['index', 'store', 'show'])->names([
    'index' => 'api.posts.index',
    'store' => 'api.posts.store',
    'show' => 'api.posts.show',
]);
Route::resource('posts.comments', 'API\CommentAPIController')->only(['index', 'store'])->names([
    'index' => 'api.posts.comments.index',
    'store' => 'api.posts.comments.store',
]);
