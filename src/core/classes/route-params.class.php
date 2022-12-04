<?php

class RouteParams
{
    private array $_map = array();

    public function __construct(array $params)
    {
        $this->_map = $params;
    }

    public function getParam(string $name): string
    {
        if (array_key_exists($name, $this->_map)) {
            return $this->_map[$name];
        }
        return null;
    }
}
