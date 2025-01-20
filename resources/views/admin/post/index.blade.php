
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
                    <p class="fw-bold fs-4">Posts</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary mb-3" href="{{ route('admin.post.create') }}"><p class="fw-bold m-0">Add</p></a>
                </div>
            </div>
            <div class="row">  <!--Table posts-->
                <div class="col-6">
                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th colspan="2">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td><a href="{{ route('post.index', $post->id) }}"><i class="bi bi-eye"></i></a></td>
                                <td><a href="{{ route('admin.post.edit', $post->id) }}"><i class="bi bi-pencil-square"></i></a></td>
                                <td>
                                  <form action="{{ route('admin.post.delete', $post->id )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                      <i class="bi bi-trash text-danger" role="button"></i>
                                    </button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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