<?php

use App\Http\Controllers\Admin\Articles\ArticleDestroyController;
use App\Http\Controllers\Admin\Articles\ArticleIndexController;
use App\Http\Controllers\Admin\Articles\ArticleShowController;
use App\Http\Controllers\Admin\Articles\ArticleStoreController;
use App\Http\Controllers\Admin\Articles\ArticleUpdateController;
use App\Http\Controllers\Admin\Categories\CategoryDestroyController;
use App\Http\Controllers\Admin\Categories\CategoryIndexController;
use App\Http\Controllers\Admin\Categories\CategoryShowController;
use App\Http\Controllers\Admin\Categories\CategoryStoreController;
use App\Http\Controllers\Admin\Categories\CategoryUpdateController;
use App\Http\Controllers\Admin\Images\ImageDestroyController;
use App\Http\Controllers\Admin\Images\ImageIndexController;
use App\Http\Controllers\Admin\Images\ImageShowController;
use App\Http\Controllers\Admin\Images\ImageStoreController;
use App\Http\Controllers\Admin\Images\ImageUpdateController;
use App\Http\Controllers\Admin\Meta\MetaDestroyController;
use App\Http\Controllers\Admin\Meta\MetaIndexController;
use App\Http\Controllers\Admin\Meta\MetaShowController;
use App\Http\Controllers\Admin\Pinned\PinnedIndexController;
use App\Http\Controllers\Admin\Pinned\PinnedUpdateController;
use App\Http\Controllers\Admin\Regions\RegionIndexController;
use App\Http\Controllers\Admin\Tags\TagDestroyController;
use App\Http\Controllers\Admin\Tags\TagIndexController;
use App\Http\Controllers\Admin\Tags\TagShowController;
use App\Http\Controllers\Admin\Tags\TagStoreController;
use App\Http\Controllers\Admin\Tags\TagUpdateController;
use App\Http\Controllers\Admin\Topics\TopicDestroyController;
use App\Http\Controllers\Admin\Topics\TopicIndexController;
use App\Http\Controllers\Admin\Topics\TopicShowController;
use App\Http\Controllers\Admin\Topics\TopicStoreController;
use App\Http\Controllers\Admin\Topics\TopicUpdateController;
use App\Http\Controllers\Admin\Users\UserDestroyController;
use App\Http\Controllers\Admin\Users\UserIndexController;
use App\Http\Controllers\Admin\Users\UserShowController;
use App\Http\Controllers\Admin\Users\UserStoreController;
use App\Http\Controllers\Admin\Users\UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->group(function () {
    Route::get('/', ArticleIndexController::class);
    Route::post('/', ArticleStoreController::class);
    Route::get('/{article}', ArticleShowController::class);
    Route::patch('/{article}', ArticleUpdateController::class);
    Route::delete('/{article}', ArticleDestroyController::class);
});

Route::prefix('categories')->group(function () {
    Route::get('/', CategoryIndexController::class);
    Route::post('/', CategoryStoreController::class);
    Route::get('/{category}', CategoryShowController::class);
    Route::patch('/{category}', CategoryUpdateController::class);
    Route::delete('/{category}', CategoryDestroyController::class);
});

Route::prefix('images')->group(function () {
    Route::get('/', ImageIndexController::class);
    Route::post('/', ImageStoreController::class);
    Route::get('/{media}', ImageShowController::class);
    Route::patch('/{media}', ImageUpdateController::class);
    Route::delete('/{media}', ImageDestroyController::class);
});

Route::prefix('regions')->group(function () {
    Route::get('/', RegionIndexController::class);
});

Route::prefix('tags')->group(function () {
    Route::get('/', TagIndexController::class);
    Route::post('/', TagStoreController::class);
    Route::get('/{tag}', TagShowController::class);
    Route::patch('/{tag}', TagUpdateController::class);
    Route::delete('/{tag}', TagDestroyController::class);
});

Route::prefix('topics')->group(function () {
    Route::get('/', TopicIndexController::class);
    Route::post('/', TopicStoreController::class);
    Route::get('/{topic}', TopicShowController::class);
    Route::patch('/{topic}', TopicUpdateController::class);
    Route::delete('/{topic}', TopicDestroyController::class);
});

Route::prefix('metas')->group(function () {
    Route::get('/', MetaIndexController::class);
    Route::get('/{meta}', MetaShowController::class);
    Route::delete('/{meta}', MetaDestroyController::class);
});

Route::prefix('pinned')->group(function () {
    Route::get('/', PinnedIndexController::class);
    Route::post('/', PinnedUpdateController::class);
});

Route::prefix('users')->group(function () {
    Route::get('/', UserIndexController::class);
    Route::post('/', UserStoreController::class);
    Route::get('/{user}', UserShowController::class);
    Route::patch('/{user}', UserUpdateController::class);
    Route::delete('/{user}', UserDestroyController::class);
});
