<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Auth::user()->userPosts;

        return view('personal.posts.index', compact('posts'));
    }
}
