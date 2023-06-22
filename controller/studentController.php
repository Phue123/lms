<?php
include_once __DIR__.'/../models/student.php';

class StudentController extends Student{
    public function getStudents(){
        return $this->getStudentList();
    }
}
?>