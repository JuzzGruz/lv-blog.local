@extends('layouts.main')

@section('content')

<main class="container min-vh-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
        <div class="">
            <div class="mx-4 p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <p class="fw-bold fs-4">Likes</p>
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="ms-4 d-flex align-items-center" style="width: 775px;">
                            <a href="{{ route('post.index', $post->id) }}">{{ $post->title }}</i></a>
                        </div>
                        <div class="ms-4">
                            <form action="{{ route('personal.likes.delete', $post->id )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">
                                    remove like
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection