
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
                    <p class="fw-bold fs-4">Add user</p>
                    @if ($errors->any())
                        <div class="alert alert-danger col-3">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li class="list-unstyled fw-bold fs-6">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.user.store') }}" class="w-25" method="POST">
                        @csrf
                        <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">User name</label> 
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">Email</label> 
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3"> 
                            <label for="exampleInputEmail1" class="form-label">Password</label> 
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group mt-2 w-25">
                            <label>Role</label>
                            <select class="form-control" name="role" id="">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"{{ $id == old('role_id') ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Create">
                    </form>
                </div>
            </div>
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->

@endsection