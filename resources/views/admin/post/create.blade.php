
@extends('admin.layouts.main')
@section('content')
    
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="">
                    <p class="fw-bold fs-4">Add Post</p>
                    <form action="{{ route('admin.post.store') }}" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">Post name</label> 
                            <input type="text" class="form-control w-25" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-2 w-25">
                                <label>Category</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>Tags</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%; margin-top: 10px;">
                                  @foreach ($tags as $tag)
                                    <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="mt-2 w-25">
                                <label>Preview images</label>
                                <div class="input-group mb-3 mt-2"> 
                                    <input type="file" class="form-control" id="inputGroupFile02" name='preview_image'> 
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label> 
                                </div>
                            </div>
                            <div class="mt-2 w-25">
                                <label>Main images</label>
                                <div class="input-group mb-3 mt-2"> 
                                    <input type="file" class="form-control" id="inputGroupFile02" name='main_image'> 
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label> 
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
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->

@endsection