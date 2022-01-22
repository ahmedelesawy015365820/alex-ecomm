@extends('layouts.adminLayout')

@section('title')
Category List
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Category List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Category List</li>
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
            <h5>Category Details</h5>
        </div>
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-xl-6 col-md-4 row align-items-center">
                    @include('dashboard.category.seaechPartial')
                </div>
                @can('user-create')
                <div class="col-xl-3 btn-popup pull-right">
                    <button type="button"
                        class="btn btn-secondary"
                        data-toggle="modal"
                        data-original-title="test"
                        data-target="#create-new"
                    >
                        Create Category
                    </button>
                </div>

                {{-- start create model --}}
                @include('dashboard.category.createPartial')
                {{-- end delete model --}}
                @endcan
            </div>

            <div style="overflow-x: scroll; width:100%; margin-bottom:20px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="wd-10p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0">Name</th>
                        <th class="wd-20p border-bottom-0">Status</th>
                        <th class="wd-10p border-bottom-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status() }}</td>
                            <td>

                                @can('user-edit')
                                <button type="button"
                                    data-toggle="modal"
                                    class="btn btn-sm btn-info"
                                    title="edit"
                                    data-target="#edit-{{$category->id}}"
                                >
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                @endcan

                                @can('user-delete')
                                <button type="button"
                                    class="btn btn-sm btn-danger"
                                    data-toggle="modal"
                                    data-original-title="test"
                                    data-target="#exampleModal-{{$category->id}}"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                @endcan

                            </td>

                            {{-- start edit model --}}
                            @include('dashboard.category.updatePartial')
                            {{-- end edit model --}}

                            {{-- start delete model --}}
                            @include('dashboard.category.deletePartial')
                            {{-- end delete model --}}
                        </tr>
                        @empty
                            <th class="text-center" colspan="8">No Data Found</th>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            {{ $categories->appends( request()->query() )->links() }}
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

