<?php

function tokenize_map(string $input, string $token, Closure $mapFn)
{

    $result = array();
    $segment = strtok($input, $token);
    while ($segment !== false) {
        array_push($result, $mapFn->__invoke($segment));
        $segment = strtok($token);
    }
    return $result;
}
