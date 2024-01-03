<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . "/../vendor/autoload.php";

use App\controller\HomeController;
use App\core\router;
use App\controller\DashController;
use App\controller\SaleController;

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
    DashController::getdata();
});
$route->post("/sale", function () {
    SaleController::addsale();
});
$route->post("/updatesale", function () {
    SaleController::updatesale();
});

$route->get("/sales", function () {
    SaleController::affsale();
});
$route->get("/deletesale", function () {
    SaleController::deletesale();
});

$route->dispatch($uri, $method);
