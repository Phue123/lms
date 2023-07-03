<?php
include_once __DIR__.'/../vendor/db/db.php';

class Project{

    public function getProjectLists(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT project.id as id,project.title as title,project.start_date as start_date,project.rate as rate,batch.name as name from project join batch where project.batch_id=batch.id";

        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchall(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getProjectedit($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT project.id as id,project.title as title,project.start_date as start_date,project.rate as rate,batch.name as name
        from project join batch
        where project.batch_id=batch.id
        and project.id=:id";

        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getProjectojt($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


        $sql="select project.*,batch.id as batch_id,batch.name as bname
        from project join batch 
        where project.id=:id
        and project.batch_id=batch.id";
        $statement=$con->prepare($sql);
        $statement->bindparam(':id',$id);
        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function addProjectsInfo($title,$start_date,$rate,$batch_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT into project(title,start_date,rate,batch_id) value(:title,:start_date,:rate,:batch_id)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':rate',$rate);
        $statement->bindParam(':batch_id',$batch_id);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function setProject($id,$title,$start_date,$rate,$batch_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE project set title=:title,start_date=:start_date,rate=:rate,batch_id=:batch_id where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':rate',$rate);
        $statement->bindParam(':batch_id',$batch_id);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function deleteProjectInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="DELETE from project where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        try{
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    

}
?>