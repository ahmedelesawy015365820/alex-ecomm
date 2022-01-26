<?php

namespace App\Repository\Review;

use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewRepository implements ReviewInterfaceRepository{

    public function index(){

        $ProductReviews = Review::with('product:id,name')
            ->orderBy('id','DESC')->paginate(10);

        return view('dashboard.reviews.index',compact('ProductReviews'));

    }//************end index */

    public function show($request){

    }//************end show */

    public function edit($review){

        return view('dashboard.reviews.edit',compact('review'));

    }//************end edit */

    public function update($request, $review){

        try{
            DB::beginTransaction();
            $review->update($request->validated());
            toastr()->success('Edited successfully');

            DB::commit();
            return redirect()->route('review.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('review.index');
        }
    }//************end update */

    public function destroy($review){

        try{
            DB::beginTransaction();
            $review->delete();
            toastr()->success('Deleted successfully');

            DB::commit();
            return redirect()->route('review.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('review.index');
        }
    }//************end destroy */

}
