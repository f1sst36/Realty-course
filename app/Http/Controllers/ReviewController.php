<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Menu;

class ReviewController extends Controller
{
    public function index(){
        $allReviews = Review::select(['author', 'text', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $menuItems = Menu::setHierarchy();

        return view('reviews', compact('allReviews', 'menuItems'));
    }
}
