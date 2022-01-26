@extends('layouts.adminLayout')

@section('title')
    Edit  Product
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
                    <h3> Edit Product
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active">Edit  Product</li>
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
            <h5>Edit Product</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form  method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Name_Ar:</label>
                                    <input class="form-control name-ar" name="name_ar" value="{{old('name_ar',$product->getTranslation('name', 'ar'))}}"  id="validationCustom01" type="text">
                                    @error('name_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Name_En:</label>
                                    <input class="form-control name-en" name="name_en" value="{{old('name_en',$product->getTranslation('name', 'en'))}}"   id="validationCustom01" type="text">
                                    @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Slug_Ar:</label>
                                    <input class="form-control slug-ar" name="slug_ar" value="{{old('slug_ar',$product->getTranslation('slug', 'ar'))}}"  id="validationCustom01" type="text">
                                    @error('slug_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Slug_En:</label>
                                    <input class="form-control slug-en" name="slug_en" value="{{old('slug_en',$product->getTranslation('slug', 'en'))}}"  id="validationCustom01" type="text">
                                    @error('slug_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Price:</label>
                                    <input class="form-control" name="price" value="{{old('price',$product->price)}}"   id="validationCustom01" type="number">
                                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Quantity:</label>
                                    <input class="form-control" name="quantity" value="{{old('quantity',$product->quantity)}}"   id="validationCustom01" type="number">
                                    @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6"  style="margin-bottom: 20px">
                                <label for="validationCustom01" class="mb-1">Category:</label>
                                <select class="custom-select" name="category_id" id="validationCustom01">
                                <option  value="">Choose...</option>
                                @foreach ($Categories as $item)
                                <option value="{{$item->id}}" {{old('category_id',$product->category_id) == $item->id ? 'selected':'';}}>
                                    {{$item->name}}
                                </option>
                                @endforeach
                                </select>
                                @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            @if (count($product->product_category->children) > 0)
                            <div class="col-6 selectsubcategory">
                                <label for="validationCustom02" class="mb-1">SubCategory:</label>
                                <select class="custom-select" name="subcategory_id" id="inputGroupSelect02">
                                <option value="">Choose...</option>
                                @foreach ($product->product_category->children as $item)
                                <option value="{{$item->id}}" {{$product->subcategory_id == $item->id ? 'selected':'';}}>
                                    {{$item->name}}
                                </option>
                                @endforeach
                                </select>
                            </div>
                            @endif
                            @if ($product->subcategory_id != '')
                                @if (count($product->product_subcategory->children) > 0)
                                <div class="col-6 selectchild ">
                                    <label for="validationCustom03" class="mb-1">Child:</label>
                                    <select class="custom-select" name="child_id" id="inputGroupSelect01">
                                    <option value="">Choose...</option>
                                    @foreach ($product->product_subcategory->children as $item)
                                    <option value="{{$item->id}}" {{$product->child_id == $item->id ? 'selected':'';}}>
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>
                                @endif
                            @endif
                            @if ($product->child_id != '')
                                @if (count($product->product_child->children) > 0)
                                <div class="col-6 selectsubchild">
                                    <label for="validationCustom01" class="mb-1">SubChild:</label>
                                    <select class="custom-select" name="subchild_id" id="inputGroupSelect03">
                                    <option value="">Choose...</option>
                                    @foreach ($product->product_child->children as $item)
                                    <option value="{{$item->id}}" {{$product->subchild_id == $item->id ? 'selected':'';}}>
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>
                                @endif
                            @endif
                            <div class="form-group col-12">
                                <label class="">Add Description_ar :</label>
                                <div class="">
                                    <textarea id="editor1" name="description_ar" cols="6" rows="4">
                                        {{old('description_ar',$product->getTranslation('description', 'ar'))}}
                                    </textarea>
                                    @error('description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="">Add Description_en :</label>
                                <div class="">
                                    <textarea id="editor2" class="ckeditor" name="description_en" cols="6" rows="4">
                                        {{old('description_en',$product->getTranslation('description', 'en'))}}
                                    </textarea>
                                    @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="feature" class="mb-1">Feature:</label>
                                <input
                                    id="feature"
                                    name="feature"
                                    type="file"
                                    accept="image/*"
                                >
                                @error('feature')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-8">
                                <label for="images" class="mb-1">Images:</label>
                                <input
                                    id="images"
                                    name="images[]"
                                    multiple
                                    type="file"
                                    accept="image/*"
                                >
                                @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-6">
                                <div class="checkbox checkbox-primary">
                                    <input id="status"
                                    name="status"
                                    {{old('status',$product->status) ? 'checked' : ''}}
                                    type="checkbox"
                                    value="1">
                                    <label for="status">Status</label>
                                </div>
                            </div>

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

@section('js')
<!-- ckeditor js-->
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
<!-- photo -->
<script src="{{ asset('assets/js/photo/js/plugins/piexif.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/js/plugins/sortable.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/js/fileinput.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/themes/fa/theme.min.js')}}"></script>

<script>
    $(function () {

        $('#feature').fileinput({
            theme: 'fa',
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'png','jpeg','svg'],
            showCancel: true,
            showRemove: true,
            showUpload: false,
            overwriteInitial: false,
            initialPreview: [
                "{{ asset('assets/products/' .$product->getTranslation('slug', 'en'). '/'.$product->feature) }}",
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreviewConfig: [
                {
                    caption: "{{ $product->feature }}",
                    size: '2221',
                    width: "100px",
                    url: "{{ route('remove_feature', ['product_id' => $product->id, '_token' => csrf_token()]) }}",
                    key: {{ $product->id }}
                }
            ]
        });

        $('#images').fileinput({
            theme: 'fa',
            maxFileCount: 10,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'png','jpeg','svg'],
            showCancel: true,
            showRemove: true,
            showUpload: false,
            overwriteInitial: false,
            initialPreview: [
                @if($product->media()->count() > 0)
                    @foreach($product->media as $media)
                        "{{ asset('assets/products/' .$product->getTranslation('slug', 'en'). '/'.$media->file_name) }}",
                    @endforeach
                @endif
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreviewConfig: [
                @if($product->media()->count() > 0)
                    @foreach($product->media as $media)
                        {
                            caption: "{{ $media->file_name }}",
                            size: '{{ $media->file_size }}',
                            width: "120px",
                            url: "{{ route('remove_image', ['image_id' => $media->id, 'product_id' => $product->id, '_token' => csrf_token()]) }}",
                            key: {{ $media->id }}
                        },
                    @endforeach
                @endif
            ]
        });

    });
</script>



@endsection
