<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Repository\SubCategory\SubCategoryInterfaceRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{


    protected $subCategory;


    function __construct(SubCategoryInterfaceRepository $subCategory){

        $this->subCategory = $subCategory;

        // $this->middleware('permission:Category-list', ['only' => ['index']]);
        // $this->middleware('permission:Category-create', ['only' => ['create','store']]);
        // $this->middleware('permission:Category-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:Category-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        return $this->subCategory->index($request);
    }

    public function store(SubCategoryRequest $request)
    {
        return $this->subCategory->store($request);
    }

    public function update(SubCategoryRequest $request, Category $category)
    {
        return $this->subCategory->update($request, $category);
    }

    public function destroy(Category $category)
    {
        return $this->subCategory->destroy($category);
    }
}