<?php

namespace App\controller;
// reference the Dompdf namespace
use Dompdf\Dompdf;
class DomPdfController
{
    public  function export($html){

        // instantiate and use the dompdf class
        $dompdf = new DomPdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('code', ['attachment'=>0]);
    }

}