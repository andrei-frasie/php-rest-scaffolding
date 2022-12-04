<?php

class HttpResponse
{
    public static function emit(EndpointResponse $endpointResponse)
    {
        http_response_code($endpointResponse->getStatusCode());
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($endpointResponse->getBody());
    }
}
