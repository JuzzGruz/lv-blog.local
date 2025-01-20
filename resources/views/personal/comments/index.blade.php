@extends('layouts.main')

@section('content')

<main class="container min-vh-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
        <div class="">
            <div class="mx-4 p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <h1 class="font-weight-bold text-center">Comments</h1>
                <hr>
                @foreach ($comments as $comment)
                <div class="row">
                    <div class="ms-4" style="width: 875px;">
                        <tr>
                            <td><a href="{{ route('post.index', $comment->commentPost->id) }}">{{ $comment->commentPost->title }}</a></td>
                            <br>
                            <td>{{ $comment->message }}</td>
                        </tr>
                    </div>
                    <div class="ms-4">
                        <ul class="navbar-nav mt-2 mt-lg-0">
                            <li class="nav-item dropdown-toggle">
                                <a class="nav-link dropdown-toggle" href="" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('personal.comment.edit', $comment->id) }}" class="dropdown-item">Edit</a>
                                    <form action="{{ route('personal.comment.delete', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            Remove comment
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection