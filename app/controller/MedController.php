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
                <td><?= $result['img'] ?></td>
                <td><?= $result['med_name'] ?></td>
                <td><?= $result['description'] ?></td>
                <td><?= $result['type'] ?></td>
                <td><?= $result['price'] ?></td>
                <td class="d-flex justify-content-around">
                    <form action="#" method="post">
                        <input type="hidden" name="med_id" value="<?= $result['med_id'] ?>" />
                        <button type="submit" name="update" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
<?php
        endforeach;
    }

    public function DeleteMed()
    {
        $id = $_POST["med_id"];
        $med = new MedModal();
        if (isset($_POST['delete'])) {
            $med->DeleteMed($id);
        }
    }
}
