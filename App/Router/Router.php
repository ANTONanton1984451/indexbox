<?php


namespace App\Router;


use App\Exceptions\HttpMethodNotFoundException;
use App\Interfaces\RequestFactoryInterface;
use App\Interfaces\RequestInterface;
use App\Interfaces\RouteFactoryInterface;
use App\Interfaces\RouteInterface;

class Router
{
    private RequestInterface $request;
    private RouteInterface $route;

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

    public function __construct(RouteFactoryInterface $routeFactory,RequestFactoryInterface $requestFactory)
    {
       $method = strtolower($_SERVER["REQUEST_METHOD"]);
       $routeMethod = $method.'Routes';

        $requestUri = $this->formRequestPath();

       if(isset(self::$$routeMethod[$requestUri])){
         $pathParams = self::$$routeMethod[$requestUri];
         $this->request = $requestFactory->getRequest();
         $this->route = $routeFactory->getRoute();

         $this->formRequest();
         $this->formRoute($pathParams);
       }else{
           throw new HttpMethodNotFoundException("Http method $method not found");
       }
    }

    /**
     * @return RouteInterface
     */
    public function getRoute(): RouteInterface
    {
        return $this->route;
    }

    private function formRoute(array $pathParams)
    {
        $this->route->setRequest($this->request);
        $this->route->setControllerMethod($pathParams[1]);
        $this->route->setControllerName($pathParams[0]);
    }

    private function formRequest() : void
    {
        $this->request->setHeaders(getallheaders());
        $this->request->setPath($_SERVER['REQUEST_URI']);
        $this->request->setMethod(strtolower($_SERVER['REQUEST_METHOD']));
        $this->request->setQueryParams($_GET);
    }

    private function formRequestPath() : string
    {
        $queryPos = strpos($_SERVER['REQUEST_URI'],'?');
        if(!$queryPos){
            $requestUri = $_SERVER['REQUEST_URI'];
        }else{
            $requestUri = substr($_SERVER['REQUEST_URI'],0,$queryPos);
        }
        return $requestUri;
    }


}