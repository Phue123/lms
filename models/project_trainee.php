<?php
include_once __DIR__.'/../vendor/db/db.php';

class projectTrainee{

    public function getProjectTraineesInfos(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT project_trainee.project_id as project_id,project_trainee.id as id,project.title as title,trainee.name as tname,project_trainee.status as status
        from project join project_trainee join trainee_course join trainee
        where project.id=project_trainee.project_id
        AND project_trainee.trainee_course_id=trainee_course.id
        AND trainee_course.trainee_id=trainee.id";
        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchall(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getProjectTraineeojtInfos($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from project_trainee where project_trainee.project_id=:id";
        // $sql="SELECT project_trainee.project_id as project_id,project.title as pname,trainee.name as tname,project_trainee.status as status
        // from project join project_trainee join trainee_course join trainee
        // where project.id=project_trainee.project_id
        // and project_trainee.trainee_course_id=trainee_course.id
        // and trainee_course.id=trainee.id
        // and project_trainee.project_id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getTraineeByProjects($project_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select project_trainee.project_id as project_id,trainee.name as tname
        from project_trainee join trainee_course join trainee
        on project_trainee.trainee_course_id=trainee_course.id
        and trainee_course.trainee_id=trainee.id
        and  project_trainee.project_id=:id";
        $statement=$con->prepare($sql);
        $statement->bindparam(':id',$project_id);

        if($statement->execute()){
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function createProjectTrainee($project_id,$trainees,$status){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        foreach($trainees as $trainee){
        $sql="INSERT into project_trainee(project_id,trainee_course_id,status) value(:project_id,:trainee_course_id,:status)";
        $statement=$con->prepare($sql);
        $statement->BindParam(':project_id',$project_id);
        $statement->BindParam(':trainee_course_id',$trainee);
        $statement->BindParam(':status',$status);
        $result=$statement->execute();
    }
    if($result){
        return true;
    }else
    {
        return false;
    }
        
    }

    public function gettraineecourses($trainee){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        foreach($trainee as $train){
            $sql="SELECT id as trainee_course_id from trainee_course where trainee_id=:train";
        $statement=$con->prepare($sql);
        $statement->BindParam(':train',$train);
        $result=$statement->execute();
    }
    if($result){
        $result=$statement->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
        
    }

    public function createojt($pname,$trainees,$status){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        for($index=0;$index<sizeof($trainees);$index++){
        $sql="INSERT into project_trainee(project_id,trainee_course_id,status) values(:project_id,:trainee_course_id,:status)";
        $statement=$con->prepare($sql);
        $statement->BindParam(':project_id',$pname);
        $statement->BindParam(':trainee_course_id',$trainees[$index]['trainee_course_id']);
        $statement->BindParam(':status',$status);
        $message=$statement->execute();
    }
    if($message){
        return true;
    }else
    {
        return false;
    }
        
    }


    public function getprojectTraineeInfo(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select project_trainee.project_id as project_id,trainee.name as tname
        from project_trainee join trainee_course join trainee
        on project_trainee.trainee_course_id=trainee_course.id
        and trainee_course.trainee_id=trainee.id";
        $statement=$con->prepare($sql);
        
        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function deleteprojectTraineeInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="delete from project_trainee where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        
        if($statement->execute()){
           return true;
        }else
        {
            return false;
        }
    }

}
?>