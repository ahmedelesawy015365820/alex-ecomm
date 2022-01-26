<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Repository\Product\ProductInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $product;

    function __construct(ProductInterfaceRepository $product){

        $this->product = $product;

        $this->middleware('permission:product-list', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        return $this->product->index($request);
    }

    public function create()
    {
        return $this->product->create();
    }

    public function store(ProductRequest $request)
    {
        return $this->product->store($request);
    }

    public function edit(Product $product)
    {
        return $this->product->edit($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        return $this->product->update($request,$product);
    }

    public function destroy(Product $product)
    {
        return $this->product->destroy($product);
    }

    public function remove_images(Request $request)
    {

        return $this->product->remove_images($request);
    }

    public function remove_feature(Request $request)
    {
        return $this->product->remove_feature($request);
    }
}
