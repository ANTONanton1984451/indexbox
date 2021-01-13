<?php


namespace App\Factories;


use App\Http\Requests\Request;
use \App\Interfaces\RequestFactoryInterface;
use \App\Interfaces\RequestInterface;

class RequestFactory implements RequestFactoryInterface
{
    public function getRequest(): RequestInterface
    {
       return new Request();
    }
}