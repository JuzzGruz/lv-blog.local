<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    protected $withCount = ['usersLiked'];
    protected $with = ['category', 'authorPost'];

    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function authorPost()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select(array('id', 'name'));
    }

    public function usersLiked()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id' , 'user_id');
    }

    public function usersComments() 
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
