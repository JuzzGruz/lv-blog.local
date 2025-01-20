<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $data = [];
        $data['usercount'] = User::all()->count();
        $data['categorycount'] = Category::all()->count();
        $data['tagcount'] = Tag::all()->count();
        $data['postcount'] = Post::all()->count();
        
        return view('admin.main.index', compact('data', 'user'));
    }
}
