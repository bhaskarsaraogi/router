<?php

namespace Collectivism\Router;

class Request
{
    public $method;
    public $scheme;
    public $host;
    public $uri;
    public $query;
    public $fragment;

    public function __construct()
    {
        $url = $_SERVER['PATH_INFO'];
        $urlParts = parse_url($url);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->scheme = $urlParts['scheme'];
        $this->host = $urlParts['host'];
        $this->uri = $urlParts['path'];
        $this->query = $urlParts['query'];
        $this->fragment = $urlParts['fragment'];
    }
}
