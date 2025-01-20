<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Requests\Archive\ArchiveSearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public function archive()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(6);

        return view('archive.index', compact('posts', 'categories', 'tags'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::where('category_id', $category->id)->paginate(6);

        return view('archive.index', compact('posts', 'category', 'categories', 'tags'));
    }

    public function search(ArchiveSearchRequest $request)
    {
        $data = $request->validated();
        $categories = Category::all();
        $tags = Tag::all();

        if (isset($data['category_id']) && isset($data['tag_ids'])) {
            $category = $data['category_id'];
            $tag = $data['tag_ids'];

            $posts = Post::whereHas('category', function (Builder $query) use ($category) {
                $query->whereKey($category);
            })->whereHas('tags', function (Builder $query) use ($tag) {
                $query->whereKey($tag);
            })->paginate(6);

            return view('archive.index', compact('posts', 'categories', 'tags'));
        } elseif (isset($data['tag_ids'])) {
            $tag = $data['tag_ids'];
            $posts = Post::whereHas('tags', function (Builder $query) use ($tag) {
                $query->whereKey($tag);
            })->paginate(6);

            return view('archive.index', compact('posts', 'categories', 'tags'));
        } else {
            $category = Category::find($data['category_id']);
            $posts = Post::where('category_id', $data['category_id'])->paginate(6);

            return view('archive.index', compact('posts', 'category', 'categories', 'tags'));
        }
        
    }
}
