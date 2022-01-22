@extends('layouts.adminLayout')

@section('title')
    User List
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>User List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">User List</li>
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
            <h5>User Details</h5>
        </div>
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-xl-6 col-md-4 row align-items-center">
                    <form class="form-inline" action="{{ route('users.index') }}" method="GET">
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="text"
                            name="search"
                            class="form-control form-control"
                            value="{{ request()->search }}"
                            placeholder="search"
                          >
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-2">search</button>
                    </form>
                </div>
                @can('user-create')
                <div class="col-xl-3 btn-popup pull-right">
                    <a href="{{route('users.create')}}" class="btn btn-secondary">Create User</a>
                </div>
                @endcan
            </div>

            <div style="overflow-x: scroll; width:100%; margin-bottom:20px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="wd-10p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0">FullName</th>
                        <th class="wd-20p border-bottom-0">E-mail</th>
                        <th class="wd-20p border-bottom-0">Username</th>
                        <th class="wd-15p border-bottom-0">image</th>
                        <th class="wd-15p border-bottom-0">Permission</th>
                        <th class="wd-10p border-bottom-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($data as $key => $user)
                        @if ($user->roles_name != 'SuperAdmin')

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <img
                                src="{{asset('assets/profile/'.$user->username.'/'.$user->image) }}"
                                onerror="src='{{ asset('assets/images/dashboard/man.png') }}'"
                                alt="profile"
                                class="img-thumbnail"
                                width="100px"
                                >
                            </td>
                            <td>
                                @if (!empty($user->getRoleNames()))

                                        @foreach ($user->getRoleNames() as $v)

                                            <label class="badge badge-success">
                                                {{ $v }}
                                            </label>

                                        @endforeach
                                @endif
                            </td>
                            <td>

                                @can('user-edit')
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-info"
                                    title="edit"
                                    >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                @endcan

                                @can('user-delete')
                                <button type="button"
                                    class="btn btn-sm btn-danger"
                                    data-toggle="modal"
                                    data-original-title="test"
                                    data-target="#exampleModal-{{$user->id}}"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                @endcan

                            </td>

                            {{-- start delete model --}}
                            <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Delete User</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Name :</label>
                                                        <input type="hidden" name="role_id" value="{{$user->id}}">
                                                        <input class="form-control" value="{{ $user->full_name }}"  readonly id="validationCustom01" type="text">
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

                            @endif
                        @empty
                            <th class="text-center" colspan="8">No Data Found</th>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            {{ $data->appends( request()->query() )->links() }}
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

