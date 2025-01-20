
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
                    <p class="fw-bold fs-4">Edit tag</p>
                </div>
            </div>
            <div class="row col-3">  <!--Table category-->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <form action="{{ route('admin.tag.update', $tag->id) }}" method="post">
                          @csrf
                          @method('PATCH')
                          <input type="text" class="form-control" name="title" value="{{ $tag->title }}">
                          <input type="submit" value="Save" class="btn btn-primary mt-3">
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