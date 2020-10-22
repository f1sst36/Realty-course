<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Review;
use App\Models\Menu;

class InfoController extends Controller
{
    public function index($article_id){
        $homeArticle = Article::find($article_id);
        $lastArticles = Article::select(['id', 'title', 'created_at'])
            ->where('type', '=', 0)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        $menuItems = Menu::setHierarchy();

        return view('home', compact('homeArticle', 'lastArticles', 'menuItems'));
    }

    public function about($article_id){
        $reviews = Review::select(['author', 'text', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        $menuItems = Menu::setHierarchy();
        $article = Article::find($article_id);
        
        
        $imgs = \DB::table('slider_imgs')->get();
        $firstImg = $imgs->pull(0);

        return view('about', compact('reviews', 'firstImg', 'imgs', 'menuItems', 'article'));
    }

    public function showMap(){
        $menuItems = Menu::setHierarchy();
        return view('map', compact('menuItems'));
    }

    public function showRealtyInfo(){
        $menuItems = Menu::setHierarchy();
        return view('realty', compact('menuItems'));
    }

    public function mainPage(){
        $menuItems = Menu::all();
        $menuItem = $menuItems->firstWhere('homepage', '>', 0);

        $item = $menuItem::setHierarchy()->firstWhere('id', '=', $menuItem->id);
        return redirect()->route($menuItem->pathForType($menuItem), $item->material_id);
    }
}
