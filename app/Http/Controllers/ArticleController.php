<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $news = Article::select(['id', 'title', 'preview', 'created_at'])
            ->where('type', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('news', compact('news'));
    }

    public function showArticle($id){
        $article = Article::where('id', '=', $id)->first();

        return view('article_detail', compact('article'));
    }
}
