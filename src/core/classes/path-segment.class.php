<?php

class PathSegment
{
    public static string $PARAM_PREFIX = ":";
    public bool $isDynamic;
    public string $part;

    public function __construct(string $segment)
    {
        $this->isDynamic = substr($segment, 0, strlen(PathSegment::$PARAM_PREFIX)) === PathSegment::$PARAM_PREFIX;
        $this->part = $segment;
    }
}
