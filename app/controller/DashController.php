<?php

namespace App\controller;

use App\Models\SaleModel;


class DashController
{
    public static function getdata()
    {


        $Data  = new SaleModel;
        $Users = $Data->getUsers();
        $Midi = $Data->getMidicin();
        $Users = $Data->addPatient();
        require __DIR__ . "/../../views/dashboard.php";

    }
}
