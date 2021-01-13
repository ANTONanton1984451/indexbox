<?php


namespace App;


use App\Interfaces\TemplateBridge;
use App\Router\Router;

class Kernel
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle()
    {
        $controller = $this->router->getRoute()->getControllerName();
        $controllerMethod = $this->router->getRoute()->getControllerMethod();

       $response = (new $controller($this->router->getRoute()->getRequest()))->$controllerMethod();

       if($response instanceof TemplateBridge){
           $response->showView();
       }
    }
}