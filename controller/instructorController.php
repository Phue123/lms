<?php
include_once __DIR__.'/../models/instructor.php';

class InstructorController extends Instructor{
    public function getInstructors(){
        return $this->getinstructorList();
    }
    public function addInstructor($name,$email,$phone,$address){
        return $this->createInstructor($name,$email,$phone,$address);
    }
    public function getInstructorInfoAdmin($id){
        return $this->getInstructorInfo($id);
    }
    public function UpdateInstructors($id,$name,$email,$phone,$address)
    {
        return $this->setInstructors($id,$name,$email,$phone,$address);
    }
    public function deleteInstructor($id){
        return $this->deleteInstructorInfo($id);
    }
}
?>