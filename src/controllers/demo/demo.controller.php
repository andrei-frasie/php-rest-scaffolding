<?php

class FakeController implements Controller
{
    function getEndpoints(): array
    {
        return [new Endpoint('/demo', 'GET', new EndpointCallback(
            function (): EndpointResponse {
                return new EndpointResponse(200, "Demo Test");
            }
        )), new Endpoint('/demo/:id', 'GET', new EndpointCallback(
            function (HttpRequest $request): EndpointResponse {
                $id = $request->routeParams->getParam(":id");
                return new EndpointResponse(200, "Get by id: " . $id);
            }
        ))];
    }
}
