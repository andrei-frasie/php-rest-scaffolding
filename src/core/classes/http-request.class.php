<?php

class HttpRequest
{

    public string $fullUrl;
    public string $url;
    public string $method;
    public QueryParams $queryParams;
    public RouteParams $routeParams;
    public array $headers;

    public function __construct(HttpContext $httpContext, array $params)
    {
        $this->queryParams = new QueryParams($httpContext->getQuery());
        $this->routeParams = new RouteParams($params);
        $this->fullUrl = $httpContext->getFullUrl();
        $this->url = $httpContext->getUrl();
        $this->method = $httpContext->getMethod();
    }
}
