<?php

namespace App\core;

class router
{
    public $routes = [];

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes["post"][$path] = $callback;
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
