
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
                    <p class="fw-bold fs-4">Edit user</p>
                </div>
            </div>
            <div class="row col-3">  <!--Table user-->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed text-nowrap">
                        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                          @csrf
                          @method('PATCH')
                          <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">User name</label> 
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                          </div>
                          <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">Email</label> 
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group mt-2 w-25">
                            <label>Role</label>
                            <select class="form-control" name="role" id="">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"{{ $id == $user->role ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                          </div>
                          <input type="submit" class="btn btn-primary" value="Update">
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