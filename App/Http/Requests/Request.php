<?php


namespace App\Http\Requests;


use App\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    private string $body;

    private array $headers;

    private array $query;

    private string $method;

    private string $path;

    public function setBody(string $body) : void
    {
        $this->body = $body;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setHeaders(array $headers) : void
    {
        $this->headers = $headers;
    }

    public function getHeader(string $name): ?string
    {
        return $this->headers[$name];
    }

    public function setQueryParams(array $query) : void
    {
        $this->query = $query;
    }

    public function getQuery(string $name): ?string
    {
        return  $this->query[$name];
    }

    public function setMethod(string $method) : void
    {
        $this->method = $method;
    }

    public function getMethod(): ?string
    {
        return  $this->method;
    }

    public function setPath(string $path) : void
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}