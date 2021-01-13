<?php


namespace App\Http\Controllers;


use App\Interfaces\RequestInterface;

class MainPageController extends Controller
{


    public function render()
    {
        return view('main_page.index',['test'=>'Title']);
    }
}