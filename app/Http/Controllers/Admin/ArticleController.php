<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Http\Requests\AddArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        $accesses = User::getAccesses();

        return view('admin.article_list', compact('articles', 'accesses'));
    }

    public function createForm(){
        return view('admin.article_add_form');
    }

    public function addArticle(AddArticleRequest $request){
        $data = $request->all();
        $article = (new Article)->fill($data);

        if($article){
            $article->save();
            return redirect()->route('articles');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания новости.']);
        }
    }

    public function editForm($id){
        $article = Article::findOrFail($id);
        return view('admin.article_edit_form', compact('article'));
    }

    public function editArticle(AddArticleRequest $request){
        $data = $request->all();
        $article = Article::findOrFail($data['id']);
        $article->update($data);

        if($article){
            return redirect()->route('articles');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания новости.']);
        }
    }

    public function deleteArticles(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(article-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            Article::destroy($id);
        }

        return redirect()->route('articles');
    }
}
