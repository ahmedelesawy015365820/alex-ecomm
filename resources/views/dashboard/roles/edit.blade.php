@extends('layouts.adminLayout')

@section('title')
Edit  Role
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Edit Role
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></li>
                    <li class="breadcrumb-item active">Edit Role</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>error</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit Role</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form  method="POST" action="{{route('roles.update',$role->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-xl-3 col-md-4"><span>*</span> Name</label>
                            <input name="name" value="{{$role->name}}" class="form-control col-xl-8 col-md-7" id="name" type="text">
                        </div>
                        <ul >
                            <li><span>*</span>Permission
                                <ul class="row">
                                    @foreach($permission as $value)
                                    <li class="col-md-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                {{ in_array($value->id, old('permission',$rolePermissions)) ? 'checked' : "" }}
                                                type="checkbox"
                                                id="{{$value->name}}" value="{{$value->id}}"
                                                name="permission[]"
                                            >
                                            <label class="form-check-label" for="{{$value->name}}">{{ $value->name }}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
