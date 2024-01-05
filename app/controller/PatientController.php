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

   // update a patient en magazine using ajax.
    public static function updatePatientEnMagasin()
    {
        $updatePatient = new Patient();
        $fullname = $_POST['fullName'];
        $userid = $_POST['userid'];
        $updatePatient->updatepatient($userid, $fullname);
        $var = $updatePatient->getPatientafterupdate($userid);
        $p = json_encode($var);
        header("Content-type: application/json");
        echo $p;
    }


}