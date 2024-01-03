<?php

namespace App\controller;
use App\Models\SaleModel;


class SaleController {
    public static function addsale() {
   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $json_data = file_get_contents('php://input');

            // Decode JSON data
            $data = json_decode($json_data, true);
        
            // Access the data as needed
            $Client = $data['client'];
            $Midi = $data['midi'];

            if(  $Client === "" || $Midi === "" ){
               $error ="you should add Client or Medicine ";
               echo $error;
                return  $error;
            }

            $addSall = new SaleModel;
            
            if(!($addSall->addSale($Client, $Midi))){
                print_r($addSall->error);
            }else{
                echo 'sale is secces';
            }
      }
    }
        public static function affsale() {

            $affSall = new SaleModel;
            $Aff = $affSall->Affsale();
            if(!$Aff){
                print_r($addSall->error);
            }
           
        $Users = $affSall->getUsers();
        $Midi = $affSall->getMidicin();

            require __DIR__ . "/../../views/sales.php";

        }
        public static function updatesale() {
   
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
                $json_data = file_get_contents('php://input');
    
                // Decode JSON data
                $data = json_decode($json_data, true);
            
                // Access the data as needed
                $Client = $data['client'];
                $Midi = $data['midi'];
                $date = $data['date'];
                $id = $data['id'];

                $addSall = new SaleModel;
                
                if(!($addSall->UpdateSale($Client,$Midi,$date,$id))){
                    print_r($addSall->error);
                }else{
                    echo 'yeeeesss';
                }
          }
        }
        public static function deletesale(){
            if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['saleid'])){
                 
                $id = $_GET['saleid'];
                $delete_sale = new SaleModel;

                if(!($delete_sale->DeleteSale($id))){
                    print_r($addSall->error);
                }else{
                    header("Location: /sales");
                    exit();
                }
            }

        }

}