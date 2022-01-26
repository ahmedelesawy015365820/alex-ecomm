<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewRequest;
use App\Models\Review;
use App\Repository\Review\ReviewInterfaceRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    protected $review;


    function __construct(ReviewInterfaceRepository $review){

        $this->review = $review;

        $this->middleware('permission:review-list', ['only' => ['index']]);
        $this->middleware('permission:review-show', ['only' => ['show']]);
        $this->middleware('permission:review-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:review-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        return $this->review->index();
    }

    public function show(Review $review)
    {
        return $this->review->show($review);
    }

    public function edit(Review $review)
    {
        return $this->review->edit($review);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        return $this->review->update($request,$review);
    }

    public function destroy(Review $review)
    {
        return $this->review->destroy($review);
    }
}
