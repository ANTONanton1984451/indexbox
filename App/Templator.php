<?php


namespace App;


class Templator
{



    public function render($test)
    {
        ob_start();
        require_once '../resources/views/main_page/index.tpl';
        echo ob_get_clean();
    }
}