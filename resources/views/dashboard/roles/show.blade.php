@extends('layouts.adminLayout')

@section('title')
    Show  Role
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Show Role
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></li>
                    <li class="breadcrumb-item active">Show Role</li>
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
            <h5>Show Role</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="form-group row">
                            <label for="name" class="col-xl-3 col-md-4">Role Name</label>
                            <input name="name" class="form-control col-xl-7 col-md-8" readonly value="{{ $role->name }}" id="name" type="text">
                        </div>
                        <div>
                            <h5 style="margin-bottom:20px;">Permissions</h5>
                            <ul class="row">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <li class="col-md-3">{{ $v->name }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
