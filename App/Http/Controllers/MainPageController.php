<?php


namespace App\Http\Controllers;


class MainPageController extends Controller
{


    public function render()
    {
        $a = 0;
        return view('main_page.index');
    }

    public function sort()
    {

    }
}