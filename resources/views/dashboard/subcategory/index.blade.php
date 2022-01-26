@extends('layouts.adminLayout')

@section('title')
SubCategory List
@endsection

@section("style")
<style>
    .subcategory_id,.child_id,.subchild_id{
        display: none;
    }
    .modal-dialog{
        max-width: 600px;
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
                    <h3>SubCategory List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">SubCategory List</li>
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
            <h5>SubCategory Details</h5>
        </div>
        <div class="card-body">

            <div class="row justify-content-between">
                {{-- <div class="col-xl-6 col-md-4 row align-items-center">
                    @include('dashboard.category.seaechPartial')
                </div> --}}
                @can('Category-create')
                <div class="col-xl-3 btn-popup pull-right">
                    <button type="button"
                        class="btn btn-secondary"
                        data-toggle="modal"
                        data-original-title="test"
                        data-target="#create-new"
                    >
                        Create SubCategory
                    </button>
                </div>

                    {{-- start create model --}}
                    @include('dashboard.subcategory.createPartial')
                    {{-- end delete model --}}
                @endcan
            </div>

            <div class="accordion" id="accordionExample">
                @forelse ( $categories as $key => $category )
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                        <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{$category->name}}
                        </button>
                        </h2>
                    </div>

                    <div id="collapse-{{$category->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="accordion" id="accordionsubCategory">
                            @forelse ($category->children as $subcategory)
                            <div class="card">
                                <div style="display: flex" class="card-header justify-content-between" id="headingOne">
                                  <h2 class="mb-0 col-4">
                                    <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$subcategory->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        --{{$subcategory->name}}
                                    </button>
                                  </h2>
                                  <div class="col-4">
                                    @can('Category-edit')
                                    <button type="button"
                                        data-toggle="modal"
                                        class="btn btn-sm btn-info"
                                        title="edit"
                                        data-target="#edit-{{$subcategory->id}}"
                                    >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                        {{-- start edit model --}}
                                        @include('dashboard.subcategory.updatePartial',['subcategory' => $subcategory])
                                        {{-- end edit model --}}
                                    @endcan

                                    @can('Category-delete')
                                    <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-toggle="modal"
                                        data-original-title="test"
                                        data-target="#exampleModal-{{$subcategory->id}}"
                                    >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>

                                        {{-- start delete model --}}
                                        @include('dashboard.subcategory.deletePartial',['subcategory' => $subcategory])
                                        {{-- end delete model --}}
                                    @endcan

                                  </div>
                                </div>

                                <div id="collapse-{{$subcategory->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionsubCategory">
                                  <div class="card-body">
                                    <div class="accordion" id="accordionchild">
                                    @forelse ($subcategory->children as $child)
                                        <div class="card">
                                            <div style="display: flex" class="card-header justify-content-between" id="headingOne">
                                                <h2 class="mb-0 col-4">
                                                <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    ---{{$child->name}}
                                                </button>
                                                </h2>
                                                <div class="col-4">
                                                    @can('Category-edit')
                                                    <button type="button"
                                                        data-toggle="modal"
                                                        class="btn btn-sm btn-info"
                                                        title="edit"
                                                        data-target="#edit-{{$child->id}}"
                                                    >
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                        {{-- start edit model --}}
                                                        @include('dashboard.subcategory.updatePartial',['subcategory' => $child])
                                                        {{-- end edit model --}}
                                                    @endcan

                                                    @can('Category-delete')
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-original-title="test"
                                                        data-target="#exampleModal-{{$child->id}}"
                                                    >
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>

                                                        {{-- start delete model --}}
                                                        @include('dashboard.subcategory.deletePartial',['subcategory' => $child])
                                                        {{-- end delete model --}}
                                                    @endcan

                                                </div>
                                            </div>
                                            <div id="collapse-{{$child->id}}" class="collapse show" aria-labelledby="heading-{{$child->id}}" data-parent="#accordionchild">
                                            <div class="card-body">
                                                <div class="accordion" id="accordionchild">
                                                    @foreach ($child->children as $subchild)
                                                    <div class="card">
                                                        <div style="display: flex" class="card-header justify-content-between"  id="headingOne">
                                                        <h2 class="mb-0 col-4">
                                                            <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$subchild->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                                ---- {{$subchild->name}}
                                                            </button>
                                                        </h2>
                                                        <div class="col-4">
                                                            @can('Category-edit')
                                                            <button type="button"
                                                                data-toggle="modal"
                                                                class="btn btn-sm btn-info"
                                                                title="edit"
                                                                data-target="#edit-{{$subchild->id}}"
                                                            >
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </button>

                                                            {{-- start edit model --}}
                                                            @include('dashboard.subcategory.updatePartial',['subcategory' => $subchild])
                                                            {{-- end edit model --}}
                                                            @endcan

                                                            @can('Category-delete')
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger"
                                                                data-toggle="modal"
                                                                data-original-title="test"
                                                                data-target="#exampleModal-{{$subchild->id}}"
                                                            >
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                                {{-- start delete model --}}
                                                                @include('dashboard.subcategory.deletePartial',['subcategory' => $subchild])
                                                                {{-- end delete model --}}
                                                            @endcan

                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @empty
                                        There is no Child
                                    @endforelse
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @empty
                            There is no SubCategory
                            @endforelse
                        </div>
                        </div>
                    </div>
                </div>
                @empty
                    There is no SubCategory
                @endforelse
              </div>

            {{ $categories->appends( request()->query() )->links() }}
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

