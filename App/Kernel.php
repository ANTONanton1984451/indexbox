<?php


namespace App;


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

    }
}