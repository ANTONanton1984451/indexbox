<?php


namespace App\Interfaces;


interface RouteFactoryInterface
{
    public function getRoute() : RouteInterface;
}