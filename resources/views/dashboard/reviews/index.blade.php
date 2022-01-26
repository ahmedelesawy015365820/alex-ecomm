@extends('layouts.adminLayout')

@section('title')
Review List
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Review List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Review List</li>
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
            <h5>Review Details</h5>
        </div>
        <div class="card-body">

            <div class="">
                {{-- <div class="col-xl-6 col-md-4 row align-items-center">
                    <form class="form-inline" action="{{ route('review.index') }}" method="GET">
                        <div class="form-group mb-2">
                          <input type="text"
                            name="search"
                            class="form-control form-control"
                            value="{{ request()->search }}"
                            placeholder="search"
                          >
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <select name="status" class="form-control form-control">
                                <option value="">-Status-</option>
                                <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{request()->status == 0 ? 'selected' : ''}}>Inactive</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-2">search</button>
                    </form>
                </div> --}}
                {{-- @can('review-create')
                <div class="col-xl-3 btn-popup pull-right">
                    <a href="{{route('review.create')}}" class="btn btn-secondary">Create Product</a>
                </div>
                @endcan --}}
            </div>

            <div style="overflow-x: scroll; width:100%; margin-bottom:20px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th class="wd-10p border-bottom-0">Name</th>
                        <th class="wd-10p border-bottom-0" >Message</th>
                        <th class="wd-10p border-bottom-0">Rating</th>
                        <th class="wd-10p border-bottom-0">Product</th>
                        <th class="wd-10p border-bottom-0">Status</th>
                        <th class="wd-10p border-bottom-0">Created at</th>
                        <th class="wd-10p border-bottom-0">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($ProductReviews as $key => $ProductReview)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $ProductReview->name }}<br>
                                {{ $ProductReview->email }}<br>
                            </td>
                            <td>
                                {{ $ProductReview->title }}
                            </td>
                            <td><span class="badge badge-success">{{ $ProductReview->rating }}</span></td>
                            <td>{{ $ProductReview->product->name }}</td>
                            <td>{{ $ProductReview->status() }}</td>
                            <td>{{ $ProductReview->created_at }}</td>
                            <td>

                                @can('review-edit')
                                <a href="{{ route('review.edit', $ProductReview->id) }}"
                                    class="btn btn-sm btn-info"
                                    title="edit"
                                    >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                @endcan

                                @can('review-delete')
                                <button type="button"
                                    class="btn btn-sm btn-danger"
                                    data-toggle="modal"
                                    data-original-title="test"
                                    data-target="#exampleModal-{{$ProductReview->id}}"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                @endcan

                            </td>

                            {{-- start delete model --}}
                            <div class="modal fade" id="exampleModal-{{$ProductReview->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Delete User</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('review.destroy', $ProductReview->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Name :</label>
                                                        <input class="form-control" value="{{ $ProductReview->name }}"  readonly id="validationCustom01" type="text">
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

                        @empty
                            <th class="text-center" colspan="8">No Data Found</th>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            {{ $ProductReviews->appends( request()->query() )->onEachSide(1)->links() }}
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

