<?php

namespace App\models;

class Patient
{

    private $fullName ;
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getFullName(){
        return $this->fullName ;
    }
    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    public function addPatientMagasin(){

        $request_addPatient = "INSERT INTO user(full_name, email, pwd, user_role) 
                                VALUES ('$this->fullName', 'NULL', 'NULL', 'patientMagasin')";
        $result = $this->db->query($request_addPatient);
        return $result;
    }

    public function getPatientEnMagasin(){

        $displaypatient = "SELECT * FROM `user` ";;
        $result = $this->db->query($displaypatient)->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function deletePatientMAgasin($user_id){
        $deletePateint = "DELETE FROM `user` where user_id = $user_id";
        $result = $this->db->query($deletePateint);
        return $result;
    }

    public function updatepatient($userid, $fullname){
        $query = "UPDATE `user` SET `full_name` = '$fullname' WHERE  `user_id` = $userid";
        $result = $this->db->query($query);
        return $result;
    }

    public function getPatientafterupdate($userid){
        $query = "SELECT * FROM user WHERE  `user_id` = $userid";
        $result = $this->db->query($query);
        return $result;
    }


}
