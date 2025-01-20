@extends('layouts.main')

@section('content')

<main>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <p class="fw-bold fs-4">Add Post</p>
                <form action="{{ route('personal.post.store') }}" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                    <div class="mb-3"> 
                        <div class="form-group mt-2 w-50 rounded">
                            <label for="exampleInputEmail1" class="form-label">Post name</label> 
                            <input type="text" class="w-100 rounded" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2 w-50 rounded">
                            <label>Category</label>
                            <select class="rounded w-100" name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"{{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Tags</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%; margin-top: 10px;">
                                @foreach ($tags as $tag)
                                    <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2 w-50 rounded">
                            <label>Preview images</label>
                            <div class="input-group mb-3 mt-2 rounded"> 
                                <input type="file" class="form-control-file" id="inputGroupFile02" name="preview_image"> 
                            </div>
                        </div>
                        <div class="form-group mt-2 w-50 rounded">
                            <label>Main images</label>
                            <div class="input-group mb-3 mt-2 rounded"> 
                                <input type="file" class="form-control-file" id="inputGroupFile02" name='main_image'> 
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection