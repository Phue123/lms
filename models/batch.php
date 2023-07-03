<?php
include_once __DIR__.'/../vendor/db/db.php';

class batch{
    public function getBatchList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT batch.id as id,batch.name as bname,batch.start_date as start_date,batch.duration as duration,batch.fee as fee,batch.discount as discount,course.name as course_id 
        from batch join course 
        where batch.course_id=course.id";
        $statement=$con->prepare($sql);

        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createBatches($name,$start_date,$duration,$fee,$discount,$course_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT into batch(name,start_date,duration,fee,discount,course_id) values(:name,:start_date,:duration,:fee,:discount,:course_id)";
        $statement=$con->prepare($sql);
        $statement->BindParam(':name',$name);
         $statement->BindParam(':start_date',$start_date);
         $statement->BindParam(':duration',$duration);
         $statement->BindParam(':fee',$fee);
         $statement->BindParam(':discount',$discount);
         $statement->BindParam(':course_id',$course_id);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getBatchInfos($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select * from batch where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);

        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateBatchInfo($id,$name,$start_date,$duration,$fee,$discount,$course_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE batch set name=:name,start_date=:start_date,duration=:duration,fee=:fee,discount=:discount,course_id=:course_id where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        $statement->BindParam(':name',$name);
         $statement->BindParam(':start_date',$start_date);
         $statement->BindParam(':duration',$duration);
         $statement->BindParam(':fee',$fee);
         $statement->BindParam(':discount',$discount);
         $statement->BindParam(':course_id',$course_id);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteBatchInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="delete from batch where id=:id";
        $statement=$con->prepare($sql);
        $statement->BindParam(':id',$id);
        try{
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getBatchInfoTraineeCourse(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select * from batch";
        $statement=$con->prepare($sql);

        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getBatchPerYear(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT year(start_date)as year,count(id) as total from batch group by year(start_date)";
        $statement=$con->prepare($sql);

        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
?>