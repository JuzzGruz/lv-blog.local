<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['post_count'] = count(Auth::user()->userPosts);
        $data['liked_post_count'] = count(Auth::user()->likedPosts);
        $data['comment_user_count'] = count(Auth::user()->userComments);

        return view('personal.main.index', compact('data'));
    }
}
