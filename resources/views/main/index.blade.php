@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts['firstPosts'] as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ 'Storage/' . $post->preview_image }}" alt="blog post">
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
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    @foreach ($posts['otherPosts'] as $pair)
                        <div class="row blog-post-row">
                            @foreach ($pair as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ 'Storage/' . $post->preview_image }}" alt="blog post">
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
                    @endforeach
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">Post Lists</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <figure class="carousel-item active">
                                    <img src="{{ 'Storage/' . $posts['carouselPosts']['first']->preview_image }}" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="{{ route('post.index', $posts['carouselPosts']['first']->id) }}">{{ $posts['carouselPosts']['first']->title }}</a>
                                    </figcaption>
                                </figure>
                                <figure class="carousel-item">
                                        <img src="{{ 'Storage/' . $posts['carouselPosts']['second']->preview_image }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.index', $posts['carouselPosts']['second']->id) }}">{{ $posts['carouselPosts']['second']->title }}</a>
                                        </figcaption>
                                </figure>
                                <figure class="carousel-item">
                                        <img src="{{ 'Storage/' . $posts['carouselPosts']['last']->preview_image }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.index', $posts['carouselPosts']['last']->id) }}">{{ $posts['carouselPosts']['last']->title }}</a>
                                        </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Most liked post</h5>
                    <hr>
                    <ul class="post-list">
                        @foreach ($posts['topPosts'] as $post)
                            <li class="post">
                                <a href="{{ route('post.index', $post->id) }}" class="post-permalink media">
                                    <img src="{{ 'Storage/' . $post->preview_image }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <hr>
                    @foreach ($categories as $category)
                        <p><a href="{{ route('categoryPosts', $category->id) }}" class="text-reset"><strong>{{ $category->title }}</strong></a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</main>

@endsection