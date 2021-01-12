<?php


namespace App\Router;


use App\Exceptions\HttpMethodNotFoundException;

class Router
{
    /**
     * @var array
     */
    private static $getRoutes = ['test'];

    /**
     * @var array
     */
    private static $postRoutes;

    public static function  __callStatic($name,$arguments)
    {
        $arrayRoutes = $name.'Routes';

        if(isset(self::$$arrayRoutes)){
            self::$$arrayRoutes[$arguments[0]] = $arguments[1];
        }else{
            throw new HttpMethodNotFoundException();
        }
    }
}