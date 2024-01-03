<?php

namespace App\Models;

use App\Models\Database;
use PDO;
use PDOException;

class MedModal
{
    public $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function ViewMeds()
    {
        try {
            $sql = "select * from medicine";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "error : " . $e->getMessage();
        }
    }

    public function getLastMedid()
    {
        try {
            $sql = "select max(med_id) as last_id from medicine";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "error : " . $e->getMessage();
        }
    }

    public function AddMed($MedName, $type, $description, $price, $img)
    {
        $sql = "insert into medicine values ( NULL , ? , ? , ? , ? , ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $MedName);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $img);
        return $stmt->execute();
    }
    public function UpdateMed($id, $MedName, $type, $description, $price, $img)
    {
        $sql = "UPDATE medicine SET med_name = ?, type = ?, description = ?, price = ?, img = ? WHERE med_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $MedName);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $img);
        $stmt->bindParam(6, $id);
        return $stmt->execute();
    }
    public function DeleteMed($id)
    {
        $sql = "delete from medicine where med_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
