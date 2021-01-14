<?php


namespace App\Http\Controllers;


use App\Models\Product;

class SearchController extends Controller
{
    public function getSearchResult()
    {
        $searchValue = $this->request->getQuery('name');

        $blogSearch = Product::hasOneBlog($searchValue);

        return response($blogSearch->toArray(),'json');
    }
}