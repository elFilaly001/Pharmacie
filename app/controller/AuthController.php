<?php
namespace App\Controllers;
use App\Models\AuthModels;

class AuthController{
    public function SignUp(){

        if(isset($_POST["submit"])){
            $NameUtilisateur = $_POST["full_name"];
            $email = $_POST["email"];
            $pass = $_POST["pwd"];
            $c_pass = $_POST["c_password"];
        
            if($pass === $c_pass){
            $User =  new AuthModels();
            $hached_pass = password_hash($pass, PASSWORD_DEFAULT);
        
            $register = $User->SignUp($full_name , $email , $hached_pass);    
        
            if ($register == 0) {
                header("Location:?route=register&msgEmail=Email est deja existe");
                exit; 
            }

            else if($register == 1) {
                header ("Location:?route=login");
            }
        
        }
            else{
            header("Location:?route=register&msgPass=La comfirmation de code est pas marche");
            exit;
            }
        
        }

    }
}

?>