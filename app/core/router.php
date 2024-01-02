<?php

namespace App\core;

class router
{
    public $routes = [];

    public function get($uri, $callback)
    {
        $this->routes["get"][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes["post"][$uri] = $callback;
    }

    public function dispatch($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method] ?? array())) {
            $this->routes[$method][$uri]();
            
        } else {
            echo "NOT FOUND";
        }
    }
}
