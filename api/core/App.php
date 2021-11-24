<?php

namespace Core;

use Core\Router;

class App {

    private $query;
    private $requestMethod;
    private $routes;

    public function __construct($query, $requestMethod, $routes)
    {
        $this->query = $query;
        $this->requestMethod = $requestMethod;
        $this->routes = $routes;
    }

    public function run() {
        $track = (new Router)->getTrack($this->routes, $this->query, $this->requestMethod);
        ( new Dispatcher ) -> getPage($track);
    }
}