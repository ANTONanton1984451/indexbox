<?php


namespace App\Interfaces;




interface RouteInterface
{
    public function getRequest() : RequestInterface;
    public function setRequest(RequestInterface $request) : void;

    public function getControllerName() : string;
    public function setControllerName(string $controller) : void;

    public function getControllerMethod() : string;
    public function setControllerMethod(string $method) : void;
}