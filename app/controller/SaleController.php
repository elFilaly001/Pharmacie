<?php

namespace App\controller;
use App\Models\SaleModel;


class SaleController {
    public static function addsale() {
   
        if(isset($_POST['add-new-m-sale'])){
            echo'jjjj';
            $Client = $_POST['SelectUser'];
            $Midi = $_POST['SelectMedicin'];
            print_r($_POST);
            if(  $Client === "" || $Midi === "" ){
               $error =" Miss Client or Medicin ";
                return  $error;
            }

            $addSall = new SaleModel;
            
            if($addSall->addSale($Client, $Midi)){
                header("Location:/dash");
                exit();
            }else{
                print_r($addSall->error);
            }


        }

       
    }


}