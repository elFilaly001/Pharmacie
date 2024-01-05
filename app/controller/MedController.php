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
    public function AllMeds()
    {
        $sale = new MedModal();
        $results = $sale->ViewMeds();
        return $results;
    }

    public function DeleteMed()
    {
        $id = $_GET["delid"];
        $med = new MedModal();
        $med->DeleteMed($id);
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
        $allowed = array('jpg', 'png', 'jif', 'jpeg');
        $image = explode('.', $image_name);
        $image_ext = strtolower(end($image));
        if ($image_error == 4) {
            echo "file is not uploaded";
        } else if ($image_size) {
            if (in_array($image_ext, $allowed)) {
                $MedImage = uniqid() . $image_name;
                move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . '/assets/img2/' . $MedImage);
                $med->AddMed($name, $type, $desc, $price, $MedImage);
                $last_id = $med->getLastMedId();
                $result = json_encode($last_id);
                header("Content-type: application/json");
                echo $result;
            } else {
                echo "file is not valid you need this extention ('jpg' , 'png' , 'jpeg')";
            }
        } else {
            echo "size to file is too heigh to upload";
        }
    }

    public function getLastId()
    {
        $med = new MedModal();
        $med->getLastMedId();
        $res = json_encode($med);
        header("Content-type: application/json");
        echo $res;
    }

    public function updateMed()
    {
        $med = new MedModal();
        $id = $_POST["med_id"];
        $name = $_POST["med_name"];
        $type = $_POST["med_type"];
        $desc = $_POST["med_desc"];
        $price = $_POST["med_price"];

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
                $med->UpdateMed($id, $name, $type, $desc, $price, $MedImage);
            } else {
                echo "file is not valid you need this extention ('jpg' , 'png' , 'jpeg')";
            }
        } else {
            echo "size to file is too heigh to upload";
        }
    }

    public function findMedById()
    {
        $med = new MedModal();
        $id = $_GET["id"];
        $results = $med->findMed($id);
        $jsonResponse = json_encode($results);
        header('Content-Type: application/json');
        echo $jsonResponse;
    }
}
