@extends('layouts.adminLayout')

@section('title')
    Create  User
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Create  User
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">User</a></li>
                    <li class="breadcrumb-item active">Create  User</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add User</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form  method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> First Name</label>
                            <input class="form-control col-xl-8 col-md-7" name="first_name" value="{{old('first_name')}}" id="validationCustom0" type="text" >
                            <div style="margin: auto">@error('first_name')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Last Name</label>
                            <input class="form-control col-xl-8 col-md-7" name="last_name" value="{{old('last_name')}}" id="validationCustom1" type="text" >
                            <div style="margin: auto">@error('last_name')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Username</label>
                            <input class="form-control col-xl-8 col-md-7" name="username" value="{{old('username')}}" id="validationCustom1" type="text" >
                            <div style="margin: auto">@error('username')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                            <input class="form-control col-xl-8 col-md-7" name="email" value="{{old('email')}}" id="validationCustom2" type="email" >
                            <div style="margin: auto">@error('email')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
                            <input class="form-control col-xl-8 col-md-7" name="password" value="{{old('password')}}" id="validationCustom3" type="password" >
                            <div style="margin: auto">@error('password')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
                            <input class="form-control col-xl-8 col-md-7" name="confirm-password" id="validationCustom4" type="password" >
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span>Permission</label>
                            <select name="roles_name" class="form-control col-xl-8 col-md-7">
                                <option value="">--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                @endforeach
                            </select>
                            <div style="margin: auto">@error('roles_name')<span class="text-danger">{{ $message }}</span>@enderror</div>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
