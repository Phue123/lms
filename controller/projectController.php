<?php
include_once __DIR__.'/../models/project.php';

class ProjectController extends Project{

    public function getProjectes(){
        return $this->getProjectLists();
    }

    public function getProjectedits($id){
        return $this->getProjectedit($id);
    }

    public function getProjectojts($id){
        return $this->getProjectojt($id);
    }


    public function addProjects($title,$start_date,$rate,$batch_id){
        return $this->addProjectsInfo($title,$start_date,$rate,$batch_id);
    }

    public function updateProject($id,$title,$start_date,$rate,$batch_id){
        return $this->setProject($id,$title,$start_date,$rate,$batch_id);
    }

    public function deleteProject($id){
        return $this->deleteProjectInfo($id);
    }

    public function addojtTrainees($trainee){
        return $this->createojtTrainees($trainee);
    }
}
?>