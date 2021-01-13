<?php


namespace App\Interfaces;


interface RequestFactoryInterface
{
    public function getRequest() : RequestInterface;
}