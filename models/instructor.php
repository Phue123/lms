<?php
include_once __DIR__.'/../vendor/db/db.php';

class Instructor{

    public function getinstructorList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from instructor";
        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchall(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createInstructor($name,$email,$phone,$address){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT into instructor(name,email,phone,address) values(:name,:email,:phone,:address)";
        $statement=$con->prepare($sql);
        $statement->BindParam(':name',$name);
        $statement->BindParam(':email',$email);
        $statement->BindParam(':phone',$phone);
        $statement->BindParam(':address',$address);
        //$result=$statement->execute(array(':name'=>$name,':email'=>$email,':phone'=>$phone,':address'=>$address));
        if($statement->execute()){
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getInstructorInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select * from instructor where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);

        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;

        }
    }

    public function setInstructors($id,$name,$email,$phone,$address){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE instructor set name=:name,email=:email,phone=:phone,address=:address where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        $statement->BindParam(':name',$name);
        $statement->BindParam(':email',$email);
        $statement->BindParam(':phone',$phone);
        $statement->BindParam(':address',$address);

        if($statement->execute()){
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteInstructorInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="DELETE from instructor where id=:id";
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