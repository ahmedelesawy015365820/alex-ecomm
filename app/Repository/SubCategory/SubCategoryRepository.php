<?php

namespace App\Repository\SubCategory;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class SubCategoryRepository implements SubCategoryInterfaceRepository {

    public function index($request)
    {

        $categories = Category::whereParentId(0)->with(str_repeat('children.',5))->paginate(2);
        $selectCategory = Category::whereParentId(0)->get();

        return view('dashboard.subcategory.index',compact('categories','selectCategory'));

    }//*****end index

    public function store($request)
    {
        try{
            DB::beginTransaction();
            $id = 0;

            if($request->subchild_id){
                $id = $request->subchild_id;
            }else{
                if($request->child_id){
                    $id = $request->child_id;
                }else{
                    if($request->subcategory_id){
                        $id = $request->subcategory_id;
                    }else{
                        $id = $request->category_id;
                    }
                }
            }

            Category::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'slug' => [
                    'en' => SlugService::createSlug(Category::class,'slug',$request->slug_en),
                    'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
                ],
                'status' => ($request->status ? true: false),
                "parent_id" => $id
            ]);

            toastr()->success('Successfully added');
            DB::commit();
            return redirect()->route('subCategory.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('subCategory.index');
        }

    }//*****end store


    public function update($request, $category)
    {

        try{
            DB::beginTransaction();
            $id = 0;

            if($request->subchild_id){
                $id = $request->subchild_id;
            }else{
                if($request->child_id){
                    $id = $request->child_id;
                }else{
                    if($request->subcategory_id){
                        $id = $request->subcategory_id;
                    }else{
                        if($request->category_id){
                            $id = $request->category_id;
                        }else{
                            $id = 0;
                        }
                    }
                }
            }

            if($id){
                $input = ["parent_id" => $id];
            }

            $input['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $input['slug'] = [
                'en' => SlugService::createSlug(Category::class,'slug',$request->slug_en),
                'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
            ];
            $input['status'] = $request->status ? true: false;

            $category->update($input);

            toastr()->success('Edited successfully');
            DB::commit();
            return redirect()->route('subCategory.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('subCategory.index');
        }

    }//*****end update

    public function destroy($category)
    {
        try{

            DB::beginTransaction();
            $category->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('subCategory.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('subCategory.index');
        }
    }//*****end destroy

    public function categryselect($id){

        $list_categry = Category::whereParentId($id)->pluck("name", "id");
        return response()->json($list_categry);

    }

}