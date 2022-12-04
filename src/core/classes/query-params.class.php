<?php

class QueryParams
{
    private array $_map = array();

    public function __construct(string $query)
    {
        $tokensArray = tokenize_map($query, "&", function (string $part) {
            $assignIndex = strpos($part, "=");
            $queryParamName = substr($part, 0, $assignIndex);
            $queryParamValue = substr($part, $assignIndex + 1);
            return ["name" => $queryParamName, "value" => $queryParamValue];
        });

        foreach ($tokensArray as $token) {
            $this->_map[$token["name"]] = $token["value"];
        }
    }

    public function getParam(string $name): string
    {
        if (array_key_exists($name, $this->_map)) {
            return $this->_map[$name];
        }
        return null;
    }
}
