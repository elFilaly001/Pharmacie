<?php

namespace App\controller;

class HtmlPdfController
{
    public function exportstockPdf($displamedicament){
        $html = "<h1>Admin</h1>
                    <h2>Medicament Express</h2>
                    <h2>Medicament</h2>
                    <table style='width:100% ; border-collapse:collapse;'>
                        <tr>
                            <th style='border:1px solid #ddd; padding:8px; text-align:left;'> Name</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Description</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Price</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Quantity</th>
                        </tr>";

        foreach ($displamedicament as $data) {
            $html .= "<tr>
                        <td style='border:1px solid #ddd; padding:8px; text-align:left;'>" . $data['med_name'] . "</td>
                        <td style='border:1px solid #ddd; padding: 8px; text-align:left;'>" . $data['type'] . "</td>
                        <td style= 'border:1px solid #ddd; padding:8px; text-align:left;'>" . $data['description'] . " DH</td>
                        <td style= 'border:1px solid #ddd; padding:8px; text-align:left;'>" . $data['price'] . "</td>
                    </tr>";
        }

        $html .= "</table>";
        /*$html .= "
        <div style='display: flex; width: 100%'>
        <h2 style='font-size: 1.5em; margin-bottom: 10px;'>Total Medicaments: " . $countMed . "</h2>
        </div>
        ";*/

        return $html;
    }


}
