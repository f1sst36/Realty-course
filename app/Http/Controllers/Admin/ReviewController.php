<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::paginate(10);
        return view('admin.review_list', compact('reviews'));
    }

    public function createForm(){
        return view('admin.review_add_form');
    }

    public function addReview(ReviewRequest $request){
        $data = $request->all();
        $review = (new Review)->fill($data);

        if($review){
            $review->save();
            return redirect()->route('reviewList');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания отзыва.']);
        }
    }

    public function editForm($id){
        $review = Review::findOrFail($id);
        return view('admin.review_edit_form', compact('review'));
    }

    public function editReview(ReviewRequest $request){
        $data = $request->all();
        $review = Review::findOrFail($data['id']);
        $review->update($data);

        if($review){
            return redirect()->route('reviewList');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания отзыва.']);
        }
    }

    public function deleteReview(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(review-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            Review::destroy($id);
        }

        return redirect()->route('reviewList');
    }
}
