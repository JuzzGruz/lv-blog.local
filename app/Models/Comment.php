<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = false;

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(array('id', 'name', 'avatar'));
    }
    
    public function commentPost()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
