<?php
namespace App\Models;
use App\Models\Database;



class AuthModels{
    public function SignIn($email , $pass){

            $connexion = Database::getInstance();
            $conn = $connexion->getConnection();
    
            $sqlCheck = "SELECT * FROM `user` WHERE `email` = '$email'";
            $result = $conn->query($sqlCheck);
    
    
            if ($result && $result->num_rows > 0) {
                
                $row = $result->fetch_assoc();
    
                $HachPass = $row['password'];
                $role = $row['user_role'];
                // echo '=============>'.$role;
                // echo '=============>'.$HachPass;
                if(password_verify($pass, $HachPass)) 