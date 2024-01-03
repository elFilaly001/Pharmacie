<?php

namespace App\controller;

use App\Models\MedModal;
use App\Models\Database;

class MedController
{
    public $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function GetAllMeds()
    {
        $sale = new MedModal();
        $results = $sale->ViewMeds();

        $jsonResponse = json_encode($results);

        header('Content-Type: application/json');

        echo $jsonResponse;
    }

    public function DeleteMed()
    {
        $id = $_POST["med_id"];
        $med = new MedModal();
        if (isset($_POST['delete'])) {
            $med->DeleteMed($id);
        }
    }

    public function addMed()
    {
        $med = new MedModal();
        $name = $_POST["med_name"];
        $type = $_POST["med_type"];
        $desc = $_POST["med_desc"];
        $price = $_POST["med_price"];
        extract($_POST);
        $image_name = $_FILES['med_img']['name'];
        $image_temp = $_FILES['med_img']['tmp_name'];
        $image_type = $_FILES['med_img']['type'];
        $image_size = $_FILES['med_img']['size'];
        $image_error = $_FILES['med_img']['error'];
        $allowed = array('jpg', 'png', 'jif');
        $image = explode('.', $image_name);
        $image_ext = strtolower(end($image));
        if ($image_error == 4) {
            echo "file is not uploaded";
        } else if ($image_size) {
            if (in_array($image_ext, $allowed)) {
                $MedImage = uniqid() . $image_name;
                move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . '/assets/img2/' . $MedImage);
                $med->AddMed($name, $type, $desc, $price, $MedImage);
                $last_id = $med->getLastMedid()['last_id'];
                echo $last_id;
            } else {
                echo "file is not valid you need this extention ('jpg' , 'png' , 'jpeg')";
            }
        } else {
            echo "size to file is too heigh to upload";
        }
    }
}
