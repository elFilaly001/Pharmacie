<?php 


namespace App\Models;

use App\Models\Database;
use PDO;
class GetData{

    private $db;


    public function __construct()
    {      

        $this->db = Database::getInstance()->getConnection();
    }

    public function getUsers(){

        $sql = "SELECT full_name FROM medicine";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getMidicin(){

        $sql = "SELECT med_name FROM user";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


}
?>