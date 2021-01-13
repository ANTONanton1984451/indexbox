<?php


namespace App\Http\Controllers;


use App\Interfaces\RequestInterface;

abstract class Controller
{
    protected RequestInterface $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}