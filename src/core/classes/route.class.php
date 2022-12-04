<?php

class Route
{
    private Path $path;
    private Endpoint $endpoint;

    public function __construct(Endpoint $endpoint)
    {
        $this->path = new Path($endpoint->getUrl());
        $this->endpoint = $endpoint;
    }

    public function getMatch(string $url)
    {
        return $this->path->match($url);
    }

    public function activate(HttpRequest $request)
    {
        return $this->endpoint->getCallback()->exec($request);
    }
}
