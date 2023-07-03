<?php
include_once __DIR__.'/../models/project_trainee.php';

class projectTraineeController extends projectTrainee{

    public function getProjectTraineess(){
        return $this->getProjectTraineesInfos();
    }

    public function addProjectTrainee($project_id,$trainees,$status){
        return $this->createProjectTrainee($project_id,$trainees,$status);
    }

    public function getProjectTraineeojts($id){
        return $this->getProjectTraineeojtInfos($id);
    }

    public function getTraineeByProject($project_id){
        return $this->getTraineeByProjects($project_id);
    }

    public function getprojecttraineeInfos(){
        return $this->getprojecttraineeInfo();
    }

    public function gettraineecourse($trainee){
        return $this->gettraineecourses($trainee);
    }

    public function addojt($pname,$trainees,$status){
        return $this->createojt($pname,$trainees,$status);
    }

    public function deleteProjectTrainee($id){
        return $this->deleteProjectTraineeInfo($id);
    }

    public function showtrainee($id){
        
    }
}
?>