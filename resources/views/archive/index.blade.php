@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        @if (isset($category))
            <h1 class="edica-page-title" data-aos="fade-up">{{ $category->title }}</h1>
        @else
            <h1 class="edica-page-title" data-aos="fade-up">Archive</h1>
        @endif
            <form action="{{ route('archiveSearch') }}" method="post" class="d-flex">
                @csrf
                <div class="form-group m-5 w-25">
                    <label>Category</label>
                    <select class="form-control select2 py-0" name="category_id" id="">
                            <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"{{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-5 w-25">
                    <label>Tags</label>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                    @foreach ($tags as $tag)
                        <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary m-5">
                    Submit
                </button>
            </form>
        <div class="d-flex justify-content-center mb-5">
            <div class="mb-5 mx-2">
                <a href="{{ route('archive') }}" class="text-reset"><strong>All</strong></a>
            </div>
            •
            @foreach ($categories as $category)
                <div class="mb-5 mx-2">
                    <a href="{{ route('categoryPosts', $category->id) }}" class="text-reset"><strong>{{ $category->title }}</strong></a>
                </div>
                •
            @endforeach
        </div>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ asset('Storage/' . $post->preview_image) }}" alt="blog post">
                    </div>
                    <a href="{{ route('public_user_profile.index', $post->authorPost->id) }}"><p class="blog-post-category">{{ $post->authorPost->name }}</p></a>
                    <div class="row m-0">
                        <a href="{{ route('post.index', $post->id) }}" class="blog-post-permalink col-10 p-0">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                        @auth
                        <form action="{{ route('post.like.store', $post->id) }}" method="post" class="col-2 p-0">
                            @csrf
                            <button type="submit" class="b-0 bg-transparent">
                                @if (! auth()->user()->likedPosts->contains($post->id))
                                <i class="fa-regular fa-heart pr-1"></i>{{ $post->users_liked_count }}
                                @else
                                <i class="fa-solid fa-heart" style="color: #ff0000;"></i>{{ $post->users_liked_count }}
                                @endif
                            </button>
                        </form>
                        @endauth
                        @guest
                        <i class="fa-solid fa-heart" style="color: #ff0000;"></i>{{ $post->users_liked_count }}
                        @endguest
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div >
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>
</main>

@endsection