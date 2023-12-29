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
    public static function dashboard(){
        require __DIR__. "/../../views/dashboard.php";
    }
}
