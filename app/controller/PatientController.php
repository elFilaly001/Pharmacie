<?php

namespace App\controller;

use App\models\Patient;

class PatientController
{

  public static function addPatientEnMagasin(){
        $fullName = $_POST['name_patient'];
      $patient = new Patient();
      $patient->setFullName($fullName);
      $patient->addPatientMagasin();
      header("Location: /dash");
   }

   public static function deletePatientmagasin(){
      $user_id = $_GET['user_id'];
      $deleting = new Patient();
      $deleting->deletePatientMAgasin($user_id);
      header("Location: /dash");
   }





}