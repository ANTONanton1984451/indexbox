<?php


namespace App;


use App\Exceptions\UnsupportedFormatResponseException;
use App\Interfaces\FormatterInterFace;
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
       }elseif ($response instanceof FormatterInterFace){
           $response->showResponse();
       }else{
           throw new UnsupportedFormatResponseException("Not supported format of response");
       }
    }
}