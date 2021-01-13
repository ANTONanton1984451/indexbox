<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class ArticleController extends Controller
{
    public function get(){

        $blog = Blog::findByKey($this->request->getQuery('articleId'));

        return view('article.index',$blog->toArray());

    }
}