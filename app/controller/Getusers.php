<?php

namespace App\controller;
use App\Models\GetData;


class Getusers{


    public static function getusers(){
          
    $users = new GetData;
    $users->getUsers();
    require __DIR__ . "/../../views/dashboard.php";


    }

}
