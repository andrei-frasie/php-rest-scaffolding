<?php

require API_CONTROLLERS_PATH . "celebrities/celebrities.repository.php";

class CelebritiesController implements Controller
{
    private CelebritiesRepository $_celebritiesRepo;

    public function __construct()
    {
        $this->_celebritiesRepo = new CelebritiesRepository();
    }

    function getEndpoints(): array
    {
        return [new Endpoint('/celebrities', 'GET', new EndpointCallback(
            function (): EndpointResponse {
                $data = $this->_celebritiesRepo->getAll();
                return new EndpointResponse($data !== null ? 200 : 404, $data);
            }
        )), new Endpoint('/celebrities/:id', 'GET', new EndpointCallback(
            function (HttpRequest $request): EndpointResponse {
                $name = $request->routeParams->getParam(":id");
                return new EndpointResponse(200, "Data for:  " . $name);
            }
        ))];
    }
}
