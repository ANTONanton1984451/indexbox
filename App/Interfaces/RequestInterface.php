<?php


namespace App\Interfaces;


interface RequestInterface
{
    public function setBody(string $body) : void;
    public function getBody() : ?string;

    public function setHeaders(array $headers) : void;
    public function getHeader(string $name) : ?string;

    public function setQueryParams(array $query) : void;
    public function getQuery(string $name) : ?string;

    public function setMethod(string $method) : void;
    public function getMethod() : ?string;

    public function setPath(string $path) : void;
    public function getPath() : ?string;

}