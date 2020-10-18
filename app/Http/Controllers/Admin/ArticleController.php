<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();

        return view('admin.article_list', compact('articles'));
    }

    public function createForm(){
        return view('admin.article_add_form');
    }

    public function addArticle(Request $request){
        dd($request->all());
    }
}
