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
    public static function Admin()
    {
        require __DIR__ . "/../../views/Admin.php";
    }
    public static function login()
    {
        require __DIR__ . "/../../views/login.php";
    }
}
