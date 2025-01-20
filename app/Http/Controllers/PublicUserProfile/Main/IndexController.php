<?php

namespace App\Http\Controllers\PublicUserProfile\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        return view('public_user_profile.index', compact('user'));
    }
}
