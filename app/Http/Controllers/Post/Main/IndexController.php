<?php

namespace App\Http\Controllers\Post\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Post $post)
    {
        try {
            $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->random(3);

            return view('post.index', compact('post', 'relatedPosts'));
        } catch (\Exception $exception) {
            $relatedPosts = null;

            return view('post.index', compact('post', 'relatedPosts'));
        }
    }
}
