<?php

class Router
{
    /** 
     * @var Route[]
     */
    private array $_routes = array();


    public function registerController(Controller $controllerInstance)
    {
        $endpoints = $controllerInstance->getEndpoints();
        foreach ($endpoints as $endpoint) {
            array_push($this->_routes, new Route($endpoint));
        }
    }

    public function handle(HttpContext $httpContext)
    {
        foreach ($this->_routes as $route) {
            $match = $route->getMatch($httpContext->getUrl());
            if (!$match) continue;

            $request = new HttpRequest($httpContext, $match === true ? array() : $match);
            return $route->activate($request);
        }

        return false;
    }
}
