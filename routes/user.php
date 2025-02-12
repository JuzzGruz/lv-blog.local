<?php

use App\Http\Controllers\Personal\Main\IndexController as PersonalIndexController;

use App\Http\Controllers\Personal\Liked\IndexController as LikedIndexController;
use App\Http\Controllers\Personal\Liked\DeleteController as LikedDeleteController;

use App\Http\Controllers\Personal\Comment\IndexController as CommentIndexController;
use App\Http\Controllers\Personal\Comment\DeleteController as CommentDeleteController;
use App\Http\Controllers\Personal\Comment\EditController as CommentEditController;
use App\Http\Controllers\Personal\Comment\UpdateController as CommentUpdateController;

use App\Http\Controllers\Personal\Post\IndexController as PersonalPostIndexController;
use App\Http\Controllers\Personal\Post\CreateController as PersonalPostCreateController;
use App\Http\Controllers\Personal\Post\DeleteController as PersonalPostDeleteController;
use App\Http\Controllers\Personal\Post\StoreController as PersonalPostStoreController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal'], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', PersonalIndexController::class)->name('personal.main.index');
        });

        Route::group(['namespace' => 'Post', 'prefix' => 'my_posts'], function () {
            Route::get('/', PersonalPostIndexController::class)->name('personal.post.index');
            Route::get('/create', PersonalPostCreateController::class)->name('personal.post.create');
            Route::post('/', PersonalPostStoreController::class)->name('personal.post.store');
            Route::delete('/{post}', PersonalPostDeleteController::class)->name('personal.post.delete');
        });

        Route::group(['namespace' => 'Liked', 'prefix' => 'liked_posts'], function () {
            Route::get('/', LikedIndexController::class)->name('personal.likes.index');
            Route::delete('/{post}', LikedDeleteController::class)->name('personal.likes.delete');
        });

        Route::group(['namespace' => 'Comment', 'prefix' => 'my_comments'], function () {
            Route::get('/', CommentIndexController::class)->name('personal.comment.index');
            Route::delete('/{comment}', CommentDeleteController::class)->name('personal.comment.delete');
            Route::get('/{comment}/edit', CommentEditController::class)->name('personal.comment.edit');
            Route::patch('/{comment}', CommentUpdateController::class)->name('personal.comment.update');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('personal.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('personal.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('personal.profile.destroy');
    });
});

require __DIR__ . '/auth.php';
