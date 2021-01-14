<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class MainPageController extends Controller
{


    public function render()
    {
        $modelRows = Blog::getModelRows(['href','title','description','views'],null,'time_create',10);
        return view('main_page.index',['blogs' => $modelRows]);
    }

    public function sort()
    {
        $limit = $this->request->getQuery('size');
        $orderBy = $this->request->getQuery('type') === 'date' ? 'create_date' : null;
        $rows = Blog::getModelRows(['href','title','description','views'],null,$orderBy,$limit);
        return response($rows,'json');
    }

    public function getAdditional()
    {
        $limit = (integer) $this->request->getQuery('size');
        $orderBy = $this->request->getQuery('type');
        $offset = $this->request->getQuery('offset');
        $rows = Blog::getModelRows(['href','title','description','views'],null,$orderBy,$limit,$offset);
        return response($rows,'json');
    }


}