@extends('layouts.main')

@section('content')

<main>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
        <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <p class="fw-bold fs-4">My posts</p>
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ '../storage/' . $post->preview_image }}" alt="blog post">
                            </div>
                            <a href="{{ route('post.index', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                            <form action="{{ route('personal.post.delete', $post->id )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-primary">
                              </form>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

@endsection