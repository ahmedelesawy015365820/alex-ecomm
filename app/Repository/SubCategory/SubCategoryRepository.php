<?php

namespace App\Repository\SubCategory;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class SubCategoryRepository implements SubCategoryInterfaceRepository {

    public function index($request)
    {

        $categories = Category::whereParentId(0)->when($request->search,function ($q) use ($request){
            return $q->whereParentId(0)->where('name->ar','like',"%". $request->search ."%")
                    ->Orwhere('name->en','like',"%". $request->search ."%");
        })->when($request->status,function ($e) use($request){
            return $e->whereStatus($request->status);
        })->paginate(8);

        return view('dashboard.category.index',compact('categories'));

    }//*****end index

    public function store($request)
    {
        try{
            DB::beginTransaction();
            Category::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'slug' => [
                    'en' => SlugService::createSlug(Category::class,'slug',$request->slug_en),
                    'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
                ],
                'status' => ($request->status ? true: false)
            ]);

            toastr()->success('Successfully added');
            DB::commit();
            return redirect()->route('category.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('category.index');
        }

    }//*****end store


    public function update($request, $category)
    {

        try{
            DB::beginTransaction();

            $category->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'slug' => [
                    'en' => SlugService::createSlug(Category::class,'slug',$request->slug_en),
                    'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
                ],
                'status' => ($request->status ? true: false)
            ]);

            toastr()->success('Edited successfully');
            DB::commit();
            return redirect()->route('category.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('category.index');
        }

    }//*****end update

    public function destroy($category)
    {
        try{

            DB::beginTransaction();
            $category->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('category.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('category.index');
        }
    }//*****end destroy


}
