<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Review;

class InfoController extends Controller
{
    public function index(){
        $homeArticle = Article::select(['title', 'text'])->where('type', '=', 1)->first();
        $lastArticles = Article::select(['id', 'title', 'created_at'])
            ->where('type', '=', 0)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('homeArticle', 'lastArticles'));
    }

    public function about(){
        $reviews = Review::select(['author', 'text', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        
        
        $imgs = \DB::table('slider_imgs')->get();
        $firstImg = $imgs->pull(0);

        return view('about', compact('reviews', 'firstImg', 'imgs'));
    }

    public function showMap(){
        return view('map');
    }

    public function showRealtyInfo(){
        return view('realty');
    }
}
