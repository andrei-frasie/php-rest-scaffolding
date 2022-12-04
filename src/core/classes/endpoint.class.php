<?php

class Endpoint
{
    private string $_url;
    private string $_method;
    private EndpointCallback $_callback;

    function __construct(string $url, string $method, EndpointCallback $callback)
    {
        $this->_url = $url;
        $this->_method = $method;
        $this->_callback = $callback;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getCallback()
    {
        return $this->_callback;
    }
}
