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
    public function Affsale(){
        $sql = "SELECT * FROM `sale` S INNER JOIN user U on S.user_id = U.user_id INNER JOIN medicine M on S.med_id=M.med_id";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
        if ($result === false) {
            $this->error = $this->db->errorInfo();

        } else {
            return $result;
        }

    }

    public function addSale($client,$midi){

        $num = uniqid();
       
        $sql = "INSERT INTO sale ( sale_number,sale_plat, user_id, med_id) VALUES (  '$num' , 'store', $client,$midi)";
        $result = $this->db->exec($sql);

        if ($result === false) {
            $this->error = $this->db->errorInfo();

        } else {
            return $result;
        }

    }
    public function UpdateSale($Client,$Midi,$date,$id){

        $req  = "UPDATE `sale` SET `user_id`='$Client',`med_id`='$Midi',`sale_date`='$date' WHERE `sale_number`='$id'";
        
        $result = $this->db->exec($req);

        if ($result === false) {
            $this->error = $this->db->errorInfo();

        } else {
            return $result;
        }
    }
    public function DeleteSale($id){
        $req  = " DELETE FROM sale WHERE `sale`.`sale_number` = '$id' ";

        $result = $this->db->exec($req);

        if ($result === false) {
            $this->error = $this->db->errorInfo();

        } else {
            return $result;
        }
    }
        



}


?>