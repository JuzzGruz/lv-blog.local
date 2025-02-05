<?php

use App\Http\Controllers\Main\IndexController;

use App\Http\Controllers\Post\Main\IndexController as PostIndexController;
use App\Http\Controllers\Post\Like\StoreController as StoreLikeController;
use App\Http\Controllers\Post\Comment\StoreController as StoreCommentController;

use App\Http\Controllers\Archive\IndexController as ArchiveIndexController;

use App\Http\Controllers\PublicUserProfile\Main\IndexController as PublicProfileController;

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('home');
});

Route::group(['namespace' => 'App\Http\Controllers\Archive'], function () {
    Route::get('/archive', [ArchiveIndexController::class, 'archive'])->name('archive');
    Route::get('/archive/{category}', [ArchiveIndexController::class, 'category'])->name('categoryPosts');
    Route::post('/archive/result', [ArchiveIndexController::class, 'search'])->name('archiveSearch');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'post'], function(){

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/{post}', PostIndexController::class)->name('post.index');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment', 'middleware' => ['auth', 'verified']], function () {
        Route::post('/{post}', StoreCommentController::class)->name('post.comment.store');
    });
    
    Route::group(['namespace' => 'Like', 'prefix' => 'like', 'middleware' => ['auth']], function () {
        Route::post('/{post}', StoreLikeController::class)->name('post.like.store');
    });
});

Route::get('/profile/{user}', PublicProfileController::class)->name('public_user_profile.index');


require __DIR__ . '/admin.php';
