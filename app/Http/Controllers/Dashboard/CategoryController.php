<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Repository\Category\CategoryInterfaceRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $Category;


    function __construct(CategoryInterfaceRepository $Category){

        $this->Category = $Category;

        // $this->middleware('permission:Category-list', ['only' => ['index']]);
        // $this->middleware('permission:Category-create', ['only' => ['create','store']]);
        // $this->middleware('permission:Category-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:Category-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        return $this->Category->index($request);
    }

    public function store(CategoryRequest $request)
    {
        return $this->Category->store($request);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->Category->update($request, $category);
    }

    public function destroy(Category $category)
    {
        return $this->Category->destroy($category);
    }
}