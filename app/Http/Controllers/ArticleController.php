<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;

class ArticleController extends Controller
{
    public function index()
    {
        $news = Article::select(['id', 'title', 'preview', 'created_at'])
            ->where('type', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        $menuItems = Menu::setHierarchy();

        return view('news', compact('news', 'menuItems'));
    }

    public function showArticle($id){
        $article = Article::where('id', '=', $id)->first();
        $menuItems = Menu::setHierarchy();

        return view('article_detail', compact('article', 'menuItems'));
    }
}
