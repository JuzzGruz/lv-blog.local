<?php

use App\Http\Controllers\Main\IndexController;

use App\Http\Controllers\Admin\Main\IndexController as AdminMainIndexController;

use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreate;
use App\Http\Controllers\Admin\Category\DeleteController as CategoryDelete;
use App\Http\Controllers\Admin\Category\EditController as CategoryEdit;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStore;
use App\Http\Controllers\Admin\Category\UpdateController as CategoryUpdate;

use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreate;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDelete;
use App\Http\Controllers\Admin\Tag\EditController as TagEdit;
use App\Http\Controllers\Admin\Tag\StoreController as TagStore;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdate;

use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShow;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreate;
use App\Http\Controllers\Admin\Post\DeleteController as AdminPostDelete;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEdit;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStore;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdate;

use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\ShowController as UserShow;
use App\Http\Controllers\Admin\User\CreateController as UserCreate;
use App\Http\Controllers\Admin\User\DeleteController as UserDelete;
use App\Http\Controllers\Admin\User\EditController as UserEdit;
use App\Http\Controllers\Admin\User\StoreController as UserStore;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdate;

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

use App\Http\Controllers\Post\Main\IndexController as PostIndexController;
use App\Http\Controllers\Post\Like\StoreController as StoreLikeController;
use App\Http\Controllers\Post\Comment\StoreController as StoreCommentController;

use App\Http\Controllers\Archive\IndexController as ArchiveIndexController;

use App\Http\Controllers\PublicUserProfile\Main\IndexController as PublicProfileController;

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
