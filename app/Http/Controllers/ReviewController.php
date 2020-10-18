<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(){
        $allReviews = Review::select(['author', 'text', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reviews', compact('allReviews'));
    }
}
