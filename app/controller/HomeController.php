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

    public static function post_Last_Id()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->getLastId();
    }
    public static function DelMed()
    {
        require __DIR__ . "/../../app/controller/MedController.php";
        $medObj = new MedController();
        $medObj->DeleteMed();
    }
  
    public static function dashboard(){
        $patientmodel = new Patient();
        $patientMagasins = $patientmodel->getPatientEnMagasin();
    }


}
