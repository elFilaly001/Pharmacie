<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\controller\HomeController;
use App\controller\PatientController;
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
    HomeController::dashboard();
});

$route->post("/patient/en-magasin", function (){
    PatientController::addPatientEnMagasin();
});

$route->get("/patient/delete-patient", function (){
    PatientController::deletePatientmagasin();
});

$route->dispatch($uri, $method);
