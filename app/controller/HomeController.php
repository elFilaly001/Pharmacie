<?php

namespace App\controller;

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
        require __DIR__ . "/../../views/dashboard.php";
    }
    public static function tables()
    {
        require __DIR__ . "/../../views/tables.php";
    }
    public static function meds()
    {
        require __DIR__ . "/../../views/charts.php";
    }
    public static function post_Med()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->addMed();
    }

    public static function get_Meds()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->GetAllMeds();
    }
    public static function get_Med()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->findMedById();
    }
    public static function post_Upd_Med()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->updateMed();
    }
}
