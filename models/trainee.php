<?php
include_once __DIR__.'/../vendor/db/db.php';

class Trainee{
    public function getTrainee(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from trainee";
        $statement=$con->prepare($sql);
        
        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function addtrainee($name,$email,$phone,$city,$education,$remark,$status){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

         $sql="INSERT INTO trainee(name,email,phone,city,education,remark,status) values(:name,:email,:phone,:city,:education,:remark,:status)";
         $statement=$con->prepare($sql);
         $statement->BindParam(':name',$name);
         $statement->BindParam(':email',$email);
         $statement->BindParam(':phone',$phone);
         $statement->BindParam(':city',$city);
         $statement->BindParam(':education',$education);
         $statement->BindParam(':remark',$remark);
         $statement->BindParam(':status',$status);

         if($statement->execute()){
            return true;
         }else{
            return false;
         }
    }

    public function getTraineeInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from trainee where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        
        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function setTrainee($id,$name,$email,$phone,$city,$education,$remark,$status){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

         $sql="UPDATE trainee set name=:name,email=:email,phone=:phone,city=:city,education=:education,remark=:remark,status=:status where id=:id";
         $statement=$con->prepare($sql);
         $statement->BindParam(':id',$id);
         $statement->BindParam(':name',$name);
         $statement->BindParam(':email',$email);
         $statement->BindParam(':phone',$phone);
         $statement->BindParam(':city',$city);
         $statement->BindParam(':education',$education);
         $statement->BindParam(':remark',$remark);
         $statement->BindParam(':status',$status);

         if($statement->execute()){
            return true;
         }else{
            return false;
         }
    }

    public function deleteTraineeInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="DELETE from trainee where id=:id";
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