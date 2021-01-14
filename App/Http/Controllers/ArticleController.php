<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class ArticleController extends Controller
{
    public function get(){

        $blog = Blog::findByKey($this->request->getQuery('id'));
        $blog->increment('views');
        return view('article.index',$blog->toArray());

    }
}