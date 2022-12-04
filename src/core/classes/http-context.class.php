<?php

class HttpContext
{
    private string $fullUrl;
    private string $url;
    private string $method;
    private string $query;
    private array $headers;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getFullUrl(): string
    {
        return $this->fullUrl;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    static function CreateCurrentContext()
    {
        $context = new HttpContext();
        $context->fullUrl = $_SERVER["REQUEST_URI"];
        $context->url = strtok($_SERVER["REQUEST_URI"], "?");
        $context->method = $_SERVER["REQUEST_METHOD"];
        $context->query = array_key_exists("QUERY_STRING", $_SERVER) ?
            $_SERVER["QUERY_STRING"] : "";
        $context->headers = [];
        return $context;
    }
}
