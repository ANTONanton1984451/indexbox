<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {
        $blogInstance = Blog::findByKey($this->request->getQuery('href'));
        $blogInstance->updateBody($this->request->getQuery('body'));
        return response('','json');
    }
}