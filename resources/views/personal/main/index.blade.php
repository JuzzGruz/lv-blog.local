@extends('layouts.main')

@section('content')

<main class="container min-vh-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
        <div class="row">
            <div class="mx-4 p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <li class="list-unstyled">
                    <a href="{{ route('personal.post.index') }}" class="btn btn-primary w-100">
                        <div class="">
                            <p class="text-center">My posts</p>
                            <h3 class="text-center">{{ $data['post_count'] }}</h3>
                        </div>
                    </a>
                </li>
                <a class="btn btn-primary mt-2" href="{{ route('personal.post.create') }}" data-aos="fade-up">Add post</a>
            </div>
            <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <a href="{{ route('personal.likes.index') }}" class="btn btn-primary h-100 d-flex align-items-center">
                    <div class="">
                        <p class="text-center">Liked posts</p>
                        <h3 class="text-center">{{ $data['liked_post_count'] }}</h3>
                    </div>
                </a>
            </div>
            <div class="mx-4 p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <a href="{{ route('personal.comment.index') }}" class="btn btn-primary h-100 d-flex align-items-center">
                    <div class="">
                        <p class="text-center">My comments</p>
                        <h3 class="text-center">{{ $data['comment_user_count'] }}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

@endsection