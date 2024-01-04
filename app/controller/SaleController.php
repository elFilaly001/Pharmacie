<?php

namespace App\controller;
use App\Models\MedModal;
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
            }
        }
    }

    public static function exportPdf(){

        if(isset($_POST['exportpdf'])){

            $pdfcontent = new MedModal();
            $displamedicament = $pdfcontent->ViewMeds();
            $htmlobjet = new HtmlPdfController();
            $html = $htmlobjet->exportstockPdf($displamedicament);
            $dompdf = new DomPdfController();
            $dompdf->export($html);
        }

    }
}