<?php


namespace App\Router;


use App\Exceptions\HttpMethodNotFoundException;

class Router
{
    private

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

    public function __construct()
    {
       $method = strtolower($_SERVER["REQUEST_METHOD"]);
       $routeMethod = $method.'Routes';

       $requestUri = $_SERVER['REQUEST_URI'];

       if(!isset(self::$$routeMethod[$requestUri])){

            $this->formRoute($requestUri);

       }else{

           throw new HttpMethodNotFoundException("Http method $method not found");

       }
    }

    private function formRoute(string $requestUri)
    {

    }
}