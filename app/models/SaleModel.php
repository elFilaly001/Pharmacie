<?php 


namespace App\Models;
use App\Models\Database;
use PDO;
class SaleModel{

    private $db;
    public $error;

    public function __construct()
    {      

        $this->db = Database::getInstance()->getConnection();
    }

    function generateUniqueNumber() {
        
        $uniqueNumber = (int) (time() . mt_rand(1000, 9999));
        return $uniqueNumber;
    }
    
    public function getUsers(){

        $sql = "SELECT full_name,user_id FROM user";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getMidicin(){

        $sql = "SELECT `med_name`,`med_id` FROM `medicine`";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addSale($client,$midi){

        $num = uniqid();
        var_dump($num);
        $sql = "INSERT INTO sale ( sale_number,sale_plat, user_id, med_id) VALUES (  '$num' , 'store', $client,$midi)";
        $result = $this->db->exec($sql);

        if ($result === false) {
            $this->error = $this->db->errorInfo();

        } else {
            return $result;
        }

    }
        



}


?>