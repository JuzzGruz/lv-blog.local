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

Route::group([
    'namespace' => 'App\Http\Controllers\Admin', 
    'prefix' => 'admin', 
    'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', AdminMainIndexController::class)->name('admin.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', AdminPostIndexController::class)->name('admin.post.index');
        Route::get('/create', AdminPostCreate::class)->name('admin.post.create');
        Route::post('/', AdminPostStore::class)->name('admin.post.store');
        Route::get('/{post}/edit', AdminPostEdit::class)->name('admin.post.edit');
        Route::get('/{post}/show', AdminPostShow::class)->name('admin.post.show');
        Route::patch('/{post}', AdminPostUpdate::class)->name('admin.post.update');
        Route::delete('/{post}', AdminPostDelete::class)->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', CategoryIndexController::class)->name('admin.category.index');
        Route::get('/create', CategoryCreate::class)->name('admin.category.create');
        Route::post('/', CategoryStore::class)->name('admin.category.store');
        Route::get('/{category}/edit', CategoryEdit::class)->name('admin.category.edit');
        Route::patch('/{category}', CategoryUpdate::class)->name('admin.category.update');
        Route::delete('/{category}', CategoryDelete::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', TagIndexController::class)->name('admin.tag.index');
        Route::get('/create', TagCreate::class)->name('admin.tag.create');
        Route::post('/', TagStore::class)->name('admin.tag.store');
        Route::get('/{tag}/edit', TagEdit::class)->name('admin.tag.edit');
        Route::patch('/{tag}', TagUpdate::class)->name('admin.tag.update');
        Route::delete('/{tag}', TagDelete::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', UserIndexController::class)->name('admin.user.index');
        Route::get('/create', UserCreate::class)->name('admin.user.create');
        Route::post('/', UserStore::class)->name('admin.user.store');
        Route::get('/{user}/edit', UserEdit::class)->name('admin.user.edit');
        Route::get('/{user}/show', UserShow::class)->name('admin.user.show');
        Route::patch('/{user}', UserUpdate::class)->name('admin.user.update');
        Route::delete('/{user}', UserDelete::class)->name('admin.user.delete');
    });
});

require __DIR__ . '/user.php';
