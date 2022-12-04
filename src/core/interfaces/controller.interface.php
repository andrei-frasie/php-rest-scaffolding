<?php

interface Controller
{
    /**
     * @return Endpoint[]
     */
    public function getEndpoints(): array;
}
