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
            $request = Post::query()->orderBy('created_at', 'desc')->take(9)->get(),

            'firstPosts' => $firstThree = [$request[0],$request[1],$request[2]],
            'otherPosts' => $otherPosts = [
                                            'first' => [$request[3],$request[4]],
                                            'second' => [$request[5],$request[6]],
                                            'last' => [$request[7],$request[8]]
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
