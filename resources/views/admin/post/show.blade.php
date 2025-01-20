
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
                    <p class="fw-bold fs-4">Show post <a href="{{ route('admin.post.index') }}"><i class="bi bi-arrow-left-circle"></i></a></p>
                </div>
            </div>
            <div class="row col-12">  <!--Table category-->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <td>Content</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{!! $post->content !!}</td>
                          </tr>
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