<?php


namespace App\Http\Controllers;


use App\Interfaces\RequestInterface;

abstract class Controller
{
    private RequestInterface $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}