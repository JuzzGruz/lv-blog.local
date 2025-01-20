@extends('layouts.main')

@section('content')

<main class="container min-vh-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="">
            <div class="mx-4 p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
                <form action="{{ route('personal.comment.update', $comment->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <textarea name="message" cols="30" rows="10">{{ $comment->message }}</textarea>
                    <input type="submit" class="btn btn-primary" value="Edit">
                </form>
            </div>
        </div>
    </div>
</main>

@endsection