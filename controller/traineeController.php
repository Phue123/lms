<?php
include_once __DIR__.'/../models/trainee.php';

class traineeController extends Trainee{
    public function getTraineeAdmin(){
        return $this->getTrainee();
    }
    public function addTraineeAdmin($name,$email,$phone,$city,$education,$remark,$status)
    {
        return $this->addTrainee($name,$email,$phone,$city,$education,$remark,$status);
    }
    public function getTraineeInfoAdmin($id){
        return $this->getTraineeInfo($id);
    }
    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status){
        return $this->setTrainee($id,$name,$email,$phone,$city,$education,$remark,$status);
    }

    public function deleteTrainee($id){
        return $this->deleteTraineeInfo($id);
    }
}
?>