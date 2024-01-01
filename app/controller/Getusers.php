<?php

namespace App\controller;

use App\Models\GetData;

class Getusers{


    public static function getusers(){
          
    $data  = new GetData;
    $Users = $data->getUsers();
    $Users = $data->getMidicin();
    $Users = $data->addPatient();
    require __DIR__ . "/../../views/dashboard.php";


    }

}
