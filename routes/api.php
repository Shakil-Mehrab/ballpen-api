<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PinnedController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TopicController;
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

Route::group([
    'prefix' => 'articles',
    'controller' => ArticleController::class,
], function () {
    Route::get('/', 'index')->middleware('cacheResponse:600');
    Route::get('/{article}', 'show')->middleware('cacheResponse:600');
    Route::get('/{article}/related', 'related')->middleware('cacheResponse:1800');
});

Route::controller(PinnedController::class)->prefix('pinned')->group(function () {
    Route::get('/', 'index')->middleware('cacheResponse:1800');
});

Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'index')->middleware('cacheResponse:604800');
    Route::get('/{category}', 'show')->middleware('cacheResponse:604800');
});

Route::controller(RegionController::class)->prefix('regions')->group(function () {
    Route::get('/', 'index')->middleware('cacheResponse:604800');
    Route::get('/{region}', 'show')->middleware('cacheResponse:604800');
});

Route::controller(TopicController::class)->prefix('topics')->group(function () {
    Route::get('/', 'index')->middleware('cacheResponse:604800');
    Route::get('/{topic}', 'show')->middleware('cacheResponse:604800');
});

Route::controller(TagController::class)->prefix('tags')->group(function () {
    Route::get('/', 'index')->middleware('cacheResponse:604800');
    Route::get('/{tag}', 'show')->middleware('cacheResponse:604800');
});

Route::controller(AuthorController::class)->prefix('authors')->group(function () {
    Route::get('/{user}', 'show')->middleware('cacheResponse:604800');
});
