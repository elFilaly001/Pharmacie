<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\controller\HomeController;
use App\core\router;
use App\controller\Getusers;

session_start();

$path = $_SERVER['REQUEST_URI'];

$uri = parse_url($path)["path"];

$method = strtolower($_SERVER["REQUEST_METHOD"]);

$route = new router();
$route->get("/", function () {
    HomeController::index();
});
$route->get("/shop", function () {
    HomeController::shop();
});
$route->get("/dash", function () {
    Getusers::getusers();
});
$route->dispatch($uri, $method);
