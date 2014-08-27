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
        $parsedUrl = parse_url($url);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
        $this->host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
        $this->uri = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $this->query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        $this->fragment = isset($parsedUrl['fragment']) ? $parsedUrl['fragment'] : '';
    }
}
