<?php

namespace App\controller;

use App\Models\MedModal;
use App\Models\Database;

class saleController
{
    public $conn;
    public function __construct($conn)
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function GetAllSales()
    {
        $sale = new MedModal();
        $results = $sale->ViewMeds();
        foreach ($results as $result) :
?>
            <tr>
                <td><?= $result[''] ?></td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
<?php
        endforeach;
    }
}
