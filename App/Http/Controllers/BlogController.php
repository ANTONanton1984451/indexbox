<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {
        $columns = [
            'href' => $this->request->getQuery('href'),
            'title' => $this->request->getQuery('title'),
            'body' =>  $this->request->getQuery('body'),
            'description' => $this->request->getQuery('description'),
            'product' => $this->request->getQuery('product'),
            'view' => $this->request->getQuery('view'),
            'time_create' => $this->request->getQuery('time_create')
        ];


        $blog = new Blog();

        foreach ($columns as $column => $value)
        {
            $blog->$column = $value;
        }

        $blog->save();

        return response('','json');
    }
}