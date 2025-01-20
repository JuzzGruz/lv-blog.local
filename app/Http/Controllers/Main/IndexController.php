<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        
        $posts = [
            $request = Post::latest()->first(9)->get(),

            'firstPosts' => $firstThree = [$request[1],$request[2],$request[3]],
            'otherPosts' => $otherPosts = [
                                            'first' => [$request[4],$request[5]],
                                            'second' => [$request[6],$request[7]],
                                            'last' => [$request[8],$request[9]]
                                            ],
            'carouselPosts' => $carouselPosts = [
                                                    $post = Post::get()->random(3),
                                                    'first' => $post[0],
                                                    'second' => $post[1],
                                                    'last' => $post[2]
                                                    ],
            'topPosts' => $topPosts = Post::withCount('usersLiked')->orderBy('users_liked_count', 'desc')->get()->take(4)
        ];
        
        return view('main.index', compact('posts', 'categories'));
    }
}
