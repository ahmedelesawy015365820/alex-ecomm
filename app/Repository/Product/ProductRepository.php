<?php

namespace App\Repository\Product;

use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductRepository implements ProductInterfaceRepository {

    public function index($request)
    {

        $products = Product::when($request->search,function ($q) use ($request){
            return $q->where('name->ar','like',"%". $request->search ."%")
                    ->Orwhere('name->en','like',"%". $request->search ."%");
        })->when($request->status,function ($e) use($request){
            return $e->whereStatus($request->status);
        })->with(['product_category:id,name','product_subcategory:id,name',
        'product_child:id,name','product_subchild:id,name'])
        ->paginate(10);

        return view('dashboard.product.index',compact('products'));

    }//*****end index

    public function create(){

        $Categories = Category::whereParentId(0)->get();

        return view('dashboard.product.create',compact('Categories'));

    }//*****end create

    public function store($request)
    {
        try{
            DB::beginTransaction();

                // picture move
                $image = $request->feature;
                $file_name = time() . $image->getClientOriginalName();
                $image->storeAs($request->slug_en, $file_name,'product');

                // insert database
                $input['name'] = ['en' => $request->name_en,'ar' => $request->name_ar];
                $input['description'] = ['en' => $request->description_en,'ar' => $request->description_ar];
                $input['slug'] = [
                    'en' => SlugService::createSlug(Product::class,'slug',$request->slug_en),
                    'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
                ];
                $input['price'] = $request->price;
                $input['quantity'] = $request->quantity;
                $input['category_id'] = $request->category_id;
                $input['subcategory_id'] = $request->subcategory_id;
                $input['child_id'] = $request->child_id;
                $input['subchild_id'] = $request->subchild_id;
                $input['feature'] = $file_name;
                $input['status'] = $request->status ? true: false;
                $product = Product::create($input);

                $i = 1;

            foreach($request->images as $cover){

                $file_size = $cover->getSize();
                $file_type = $cover->getMimeType();
                $file_image = time(). $i . $cover->getClientOriginalName();

                // picture move
                $cover->storeAs($request->slug_en, $file_image,'product');

                $product->media()->create([
                    'file_name' => $file_image ,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => true,
                    'file_sort' => $i,
                ]);

                $i++;
            }

            toastr()->success('Successfully added');
            DB::commit();
            return redirect()->route('product.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('product.index');
        }

    }//*****end store

    public function edit($product)
    {

        $Categories = Category::whereParentId(0)->get();

        return view('dashboard.product.edit',compact('Categories','product'));

    }//*****end edit

    public function update($request, $product)
    {
        try{
            DB::beginTransaction();
            if($request->hasFile('feature') && $request->feature){
                $image = $request->feature;
                $file_name = time() . $image->getClientOriginalName();
                $image->storeAs($request->slug_en, $file_name,'product');
                $input['feature'] = $file_name;
            }

            // insert database
            $input['name'] = ['en' => $request->name_en,'ar' => $request->name_ar];
            $input['description'] = ['en' => $request->description_en,'ar' => $request->description_ar];
            $input['slug'] = [
                'en' => SlugService::createSlug(Product::class,'slug',$request->slug_en),
                'ar' => SlugService::createSlug(Category::class,'slug',$request->slug_ar)
            ];
            $input['price'] = $request->price;
            $input['quantity'] = $request->quantity;
            $input['category_id'] = $request->category_id;
            $input['subcategory_id'] = $request->subcategory_id;
            $input['child_id'] = $request->child_id;
            $input['subchild_id'] = $request->subchild_id;
            $input['status'] = $request->status ? true: false;
            $product->update($input);

            if($request->images && count($request->images) > 0){
                $i = $product->media()->count() + 1 ;

                foreach($request->images as $cover){

                    $file_size = $cover->getSize();
                    $file_type = $cover->getMimeType();
                    $file_image = time(). $i . $cover->getClientOriginalName();

                    // picture move
                    $cover->storeAs($request->slug_en, $file_image,'product');

                    $product->media()->create([
                        'file_name' => $file_image ,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                        'file_status' => true,
                        'file_sort' => $i,
                    ]);

                    $i++;
                }
            }

            toastr()->success('Edited successfully');

            DB::commit();
            return redirect()->route('product.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('product.index');
        }

    }//*****end update

    public function destroy($product)
    {
        try{

            DB::beginTransaction();

            if($product->media()->count() > 0){
                Storage::disk('product')->delete($product->getTranslation('slug', 'en'));

                foreach($product->media as $media){

                    if(File::exists('assets/products/'.$product->getTranslation('slug', 'en') .'/'.$media->file_name)){
                        unlink('assets/products/'.$product->getTranslation('slug', 'en') .'/'. $media->file_name);
                    }

                    $media->delete();

                }
            }

            if($product->feature != ''){
                unlink('assets/products/'.$product->getTranslation('slug', 'en') .'/'. $product->feature);
            }

            $product->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('product.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('product.index');
        }
    }//*****end destroy


    public function remove_images($request)
    {

        $product = Product::findOrFail($request->product_id);
        $image = $product->media()->whereId($request->image_id)->first();

        if(File::exists('assets/products/'.$product->getTranslation('slug', 'en') .'/'.$image->file_name)){
            unlink('assets/products/'.$product->getTranslation('slug', 'en') .'/'. $image->file_name);
        }

        $image->delete();

        return true;
    }

    public function remove_feature($request)
    {
        $product = Product::findOrFail($request->product_id);

        if(File::exists('assets/products/'.$product->getTranslation('slug', 'en') .'/'.$product->feature)){
            unlink('assets/products/'.$product->getTranslation('slug', 'en') .'/'. $product->feature);
        }

        $product->update(['feature' => '']);

        return true;
    }



}