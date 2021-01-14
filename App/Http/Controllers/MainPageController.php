<?php


namespace App\Http\Controllers;


use App\Models\Blog;

class MainPageController extends Controller
{


    public function render()
    {
        $orderParams = ['time_create','desc'=>true];
        $modelRows = Blog::getModelRows(['href','title','description','views'],null,$orderParams,10);
        return view('main_page.index',['blogs' => $modelRows]);
    }

    public function sort()
    {
        $limit = $this->request->getQuery('size');
        $orderParams = [$this->request->getQuery('type'),'desc'=>$this->request->getQuery('desc')];
        $rows = Blog::getModelRows(['href','title','description','views'],null,$orderParams,$limit);
        return response($rows,'json');
    }

    public function getAdditional()
    {
        $limit = $this->request->getQuery('size');

        $orderParams = [$this->request->getQuery('type'),'desc'=>$this->request->getQuery('desc')];

        $offset = $this->request->getQuery('offset');
        $where = $this->request->getQuery('where');

        $rows = Blog::getModelRows(['href','title','description','views'],$where,$orderParams,$limit,$offset);
        return response($rows,'json');
    }


}