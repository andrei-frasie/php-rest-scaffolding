<?php

class EndpointResponse
{
    private int $_statusCode;
    private $_body;

    public function __construct(
        int $statusCode,
        $body
    ) {
        $this->setStatusCode($statusCode);
        $this->setBody($body);
    }

    public function setStatusCode(int $status)
    {
        $this->_statusCode = $status;
    }

    public function setBody($body)
    {
        $this->_body = $body;
    }

    public function getStatusCode()
    {
        return $this->_statusCode;
    }

    public function getBody()
    {
        return $this->_body;
    }
}
