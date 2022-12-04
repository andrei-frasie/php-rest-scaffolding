<?php

class EndpointCallback
{
    private Closure $_callback;

    /**
     * @param EndpointResponse $callback
     */
    public function __construct(Closure $callback)
    {
        $this->_callback = $callback;
    }

    public function exec(HttpRequest $request): EndpointResponse
    {
        return call_user_func($this->_callback, $request);
    }
}
