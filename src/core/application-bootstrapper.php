<?php

class ApplicationBootstraper
{
    public static function bootstrap()
    {
        $context = HttpContext::CreateCurrentContext();

        $classesThatImplementController = array_filter(get_declared_classes(), function ($className) {
            return in_array("Controller", class_implements($className));
        });

        $router = new Router();
        foreach ($classesThatImplementController as $className) {
            $router->registerController(new $className());
        }

        $routerHandleResult = $router->handle($context);
        if ($routerHandleResult !== false) {
            HttpResponse::emit($routerHandleResult);
        } else {
            HttpResponse::emit(new EndpointResponse(404, "Endpoint not found"));
        }
    }
}
