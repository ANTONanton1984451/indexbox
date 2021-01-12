<?php


namespace App\Router;


use App\Exceptions\HttpMethodNotFoundException;

class Router
{
    /**
     * @var array
     */
    private static $getRoutes;

    /**
     * @var array
     */
    private static $postRoutes;

    public static function  __callStatic($name,$arguments)
    {
        $arrayRoutes = $name.'Routes';
        self::$$arrayRoutes[$arguments[0]] = $arguments[1];
    }
}