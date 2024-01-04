<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . "/../vendor/autoload.php";

use App\controller\HomeController;
use App\controller\PatientController;
use App\core\router;
use App\controller\DashController;
use App\controller\SaleController;
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

$route->post("/patient/en-magasin", function () {
    PatientController::addPatientEnMagasin();
    HomeController::dashboard();
});
$route->get("/table", function () {
    HomeController::tables();
});

$route->get("/patient/delete-patient", function () {
    PatientController::deletePatientmagasin();
});

$route->get("/meds", function () {
    HomeController::meds();
});
$route->post("/add_med", function () {
    HomeController::post_Med();
});
$route->get("/meds/get", function () {
    HomeController::get_Meds();
});
$route->get("/med/get", function () {
    HomeController::get_Med();
});
$route->post("/medUpd", function () {
    HomeController::post_Upd_Med();
});
$route->post("/lastMed", function () {
    HomeController::post_Last_Id();
});
$route->get("/DeltMed", function () {
    HomeController::DelMed();
});

$route->post("/patient/updatePatient", function () {
    PatientController::updatePatientEnMagasin();
});

$route->dispatch($uri, $method);
