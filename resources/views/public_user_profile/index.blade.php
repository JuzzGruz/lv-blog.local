@extends('layouts.main')

@section('content')

<main class="container min-vh-100">
    <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
                <div class="d-flex">
                    <div class="col-md-6">
                        <h1>{{ $user->name }}</h1>
                        <img src="{{ asset('storage/' . ($user->avatar ?? $user->noAvatar)) }}" alt="avatar" width="200" height="200" />
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        {{ $user->description }}
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-center">
                    <h2 class="col-md-12">Posts</h2>
                    @foreach ($user->userPosts as $post)
                    <div class="col-md-3 fetured-post blog-post p-3 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg m-2" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('Storage/' . $post->preview_image) }}" alt="blog post">
                        </div>
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
            </div>
        </div>
    </div>
</main>

@endsection