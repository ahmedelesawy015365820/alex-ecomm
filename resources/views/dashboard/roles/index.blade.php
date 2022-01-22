@extends('layouts.adminLayout')

@section('title')
    Role List
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Role List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Role List</li>
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
            <h5>Role Details</h5>
        </div>
        <div class="card-body">
            @can('Permission-create')
                <div class="btn-popup pull-right">
                    <a href="{{route('roles.create')}}" class="btn btn-secondary">Create Role</a>
                </div>
            @endcan
            <div style="overflow-x: scroll; width:100%">
                <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if($role->name != 'SuperAdmin')
                                    @can('Permission-show')
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('roles.show', $role->id) }}"
                                            >
                                            show
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </a>
                                    @endcan

                                    @can('Permission-edit')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('roles.edit', $role->id) }}"
                                            title="{{ __('site.edit')}}"
                                            >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    @endcan

                                    @can('Permission-delete')
                                    <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-toggle="modal"
                                        data-original-title="test"
                                        data-target="#exampleModal-{{$role->id}}"
                                    >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    @endcan

                                @endif
                            </td>

                            {{-- start delete model --}}
                            <div class="modal fade" id="exampleModal-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Delete Role</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('roles.destroy', 'test') }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Name :</label>
                                                        <input type="hidden" name="role_id" value="{{$role->id}}">
                                                        <input class="form-control" value="{{ $role->name }}"  readonly id="validationCustom01" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end delete model --}}

                        </tr>

                        @endforeach
                    </tbody>
                  </table>
                  {{ $roles->appends( request()->query() )->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

