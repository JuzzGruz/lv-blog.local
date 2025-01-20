
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
                <div class="col-12">
                    <p class="fw-bold fs-4">Edit post</p>
                </div>
            </div>
            <div class="row">  <!--Table category-->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PATCH')
                          <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">Post name</label> 
                            <input type="text" class="form-control w-25" name="title" value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-2 w-25">
                                <label>Category</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id }}"
                                          {{ $category->id == $post->category_id ? ' selected' : '' }}
                                        >{{ $category->title }}
                                      </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                                  @foreach ($tags as $tag)
                                    <option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class='w-25 mt-2'>
                              <img src="{{ url('storage/' . $post->preview_image) }}" class="w-50" alt="Preview image">
                            </div>
                            <div class="mt-2 w-25">
                              <label>Preview image</label>
                              <div class="input-group mb-3 mt-2"> 
                                  <input type="file" class="form-control" id="inputGroupFile02"> 
                                  <label class="input-group-text" for="inputGroupFile02">Upload</label> 
                              </div>
                            </div>
                            <div class='w-25 mt-2'>
                              <img src="{{ url('storage/' . $post->main_image) }}" class="w-50" alt="Preview image">
                            </div>
                            <div class="mt-2 w-25">
                              <label>Main image</label>
                              <div class="input-group mb-3 mt-2"> 
                                  <input type="file" class="form-control" id="inputGroupFile02"> 
                                  <label class="input-group-text" for="inputGroupFile02">Upload</label> 
                              </div>
                            </div>
                            <div class="form-group mt-2">
                                <textarea id="summernote" name="content">
                                  {{ $post->content }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-2" value="Update">
                        </div>
                        </form>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->

@endsection