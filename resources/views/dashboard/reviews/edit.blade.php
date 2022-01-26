@extends('layouts.adminLayout')

@section('title')
    Review  Product
@endsection

@section("style")
<link rel="stylesheet" href="{{ asset('assets/js/photo/css/fileinput.min.css') }}">
<style>
    .subcategory_id,.child_id,.subchild_id{
        display: none;
    }
</style>
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Edit Review
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('review.index')}}">Review</a></li>
                    <li class="breadcrumb-item active">Edit  Review</li>
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
            <h5>Review Product</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form  method="POST" action="{{route('review.update',$review->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name', $review->name) }}" class="form-control">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" name="email" value="{{ old('email', $review->email) }}" class="form-control">
                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="rating">Rating</label>
                                <select name="rating" class="form-control">
                                    <option value="1" {{ old('rating', $review->rating) == '1' ? 'selected' : null }}>1</option>
                                    <option value="2" {{ old('rating', $review->rating) == '2' ? 'selected' : null }}>2</option>
                                    <option value="3" {{ old('rating', $review->rating) == '3' ? 'selected' : null }}>3</option>
                                    <option value="4" {{ old('rating', $review->rating) == '4' ? 'selected' : null }}>4</option>
                                    <option value="5" {{ old('rating', $review->rating) == '5' ? 'selected' : null }}>5</option>
                                </select>
                                @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <label for="product_id">Product</label>
                                <input type="text" value="{{ $review->product->name }}" class="form-control" readonly>
                                <input type="hidden" name="product_id" value="{{ $review->product_id }}" class="form-control" readonly>
                                @error('product_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $review->status) == '1' ? 'selected' : null }}>Active</option>
                                    <option value="0" {{ old('status', $review->status) == '0' ? 'selected' : null }}>Inactive</option>
                                </select>
                                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ $review->title }}" class="form-control">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control" cols="6" rows="6">{{ $review->message }}</textarea>
                                @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="pull-right" style="margin-top:20px">
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

