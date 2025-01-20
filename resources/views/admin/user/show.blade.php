
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
                    <p class="fw-bold fs-4">Show user <a href="{{ route('admin.user.index') }}"><i class="bi bi-arrow-left-circle"></i></a></p>
                </div>
            </div>
            <div class="row col-12">  <!--Table user-->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <td>Id</td>
                          </tr>
                          <tr>
                            <td>Name</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $user->id }}</td>
                          </tr>
                          <tr>
                            <td>{{ $user->name }}</td>
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