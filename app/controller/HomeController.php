<?php

namespace App\controller;

use App\models\Patient;

class HomeController
{
    public static function index()
    {
        require __DIR__ . "/../../views/index.php";
    }
    public static function shop()
    {
        require __DIR__ . "/../../views/shop.php";
    }
  
    public static function dashboard()
    {
        $patientmodel = new Patient();
        $patientMagasins = $patientmodel->getPatientEnMagasin();
        require __DIR__. "/../../views/dashboard.php";
    }
    public static function tables()
    {
        require __DIR__ . "/../../views/tables.php";
    }
    public static function meds()
    {
        require __DIR__ . "/../../views/charts.php";
    }
}
