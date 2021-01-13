<?php


namespace App\Router;


use App\Interfaces\RequestInterface;
use App\Interfaces\RouteInterface;

class Route implements RouteInterface
{
    private RequestInterface $request;
    private string $controllerName;
    private string $method;

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function setControllerName(string $controller): void
    {
        $this->controllerName = $controller;
    }

    public function getControllerMethod(): string
    {
        return $this->method;
    }

    public function setControllerMethod(string $method): void
    {
        $this->method = $method;
    }
}