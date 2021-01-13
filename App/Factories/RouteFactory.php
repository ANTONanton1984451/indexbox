<?php


namespace App\Factories;

use \App\Interfaces\RouteFactoryInterface;
use \App\Interfaces\RouteInterface;
use \App\Router\Route;

class RouteFactory implements RouteFactoryInterface
{

    public function getRoute(): RouteInterface
    {
        return new Route();
    }
}