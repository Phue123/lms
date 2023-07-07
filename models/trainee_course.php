<?php
include_once __DIR__.'/../vendor/db/db.php';

class TraineeCourse{
    public function getTrainCourse(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT trainee_course.id as id,batch.name as bname,trainee.name as tname,trainee_course.joined_date as joined_date,trainee_course.status as status,trainee_course.email_status as email_status
        FROM batch join trainee_course JOIN trainee
        on batch.id=trainee_course.batch_id
        AND trainee_course.trainee_id=trainee.id
        group by trainee_course.id";
        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
        }

        public function createTrainCourse($bname,$trainee_id,$joined_date,$status){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
             $sql="INSERT INTO trainee_course(batch_id,trainee_id,joined_date,status) values(:batch_id,:trainee_id,:joined_date,:status)";
             $statement=$con->prepare($sql);
             $statement->BindParam(':batch_id',$bname);
             $statement->BindParam(':trainee_id',$trainee_id);
             $statement->BindParam(':joined_date',$joined_date);
             $statement->BindParam(':status',$status);
            
    
             if($statement->execute()){
                return true;
             }else{
                return false;
             }
        }

        public function getTrainCourseAdmin($id){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="SELECT trainee_course.id as id,trainee_course.batch_id as batch_id,batch.name as bname,trainee_course.trainee_id as trainee_id,trainee.name as tname,trainee_course.joined_date as joined_date,trainee_course.status as status
            FROM batch join trainee_course JOIN trainee
            on batch.id=trainee_course.batch_id
            AND trainee_course.trainee_id=trainee.id
             where trainee_course.id=:id";
            $statement=$con->prepare($sql);
            $statement->bindparam(':id',$id);
            if($statement->execute()){
                $result=$statement->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function setTraineeCourse($id,$bname,$tname,$joined_date,$status){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
             $sql="UPDATE trainee_course set batch_id=:bname,trainee_id=:tname,joined_date=:joined_date,status=:status  where id=:id";
             $statement=$con->prepare($sql);
             $statement->BindParam(':id',$id);
             $statement->BindParam(':bname',$bname);
             $statement->BindParam(':tname',$tname);
             $statement->BindParam(':joined_date',$joined_date);
             $statement->BindParam(':status',$status);
             
             if($statement->execute()){
                return true;
             }else{
                return false;
             }
        }

        public function deleteTraineeCourseInfo($id){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="DELETE from trainee_course where id=:id";
            $statement=$con->prepare($sql);
            $statement->BindParam(':id',$id);
            try{
                $statement->execute();
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    

        public function getmailTrainee($id){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="SELECT trainee_course.id as trainee_course_id,course.outline as outline,course.image as image,batch.duration as duration,trainee_course.id as id,batch.name as bname,trainee.name as tname,trainee.email as email,trainee_course.joined_date as joined_date,trainee_course.status as status
            FROM batch join course join trainee_course JOIN trainee
            on batch.id=trainee_course.batch_id
            AND trainee_course.trainee_id=trainee.id
            AND batch.course_id=course.id
             where trainee_course.id=:id";
            $statement=$con->prepare($sql);
            $statement->BindParam(':id',$id);
            if($statement->execute()){
                $result=$statement->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function getNoOfTrainee(){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="SELECT course.name as name,COUNT(trainee_course.trainee_id) as total
            from batch JOIN trainee_course join course
            WHERE batch.course_id=course.id
            AND trainee_course.batch_id=batch.id
            GROUP BY batch.course_id";
            $statement=$con->prepare($sql);
    
            if($statement->execute()){
                $result=$statement->fetchALL(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function gettraineeByBatch($pid){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="select trainee_course.trainee_id as trainee_id,trainee.name as name
            from trainee_course join trainee
            where trainee_course.trainee_id=trainee.id
            and trainee_course.batch_id=:id";
            $statement=$con->prepare($sql);
            $statement->bindparam(':id',$pid);
    
            if($statement->execute()){
                $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function setEmailDetails($id){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql="Update trainee_course set email_status=1 where id=:id";
            $statement=$con->prepare($sql);
            $statement->BindParam(':id',$id);
    
            try{
                $statement->execute();
                return true;
            }catch(PDOException $e){
                return false;
            }
        }

        public function gettraineesInfo(){
            $con=Database::connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            // $sql="select trainee_course.trainee_id as trainee_id,trainee.name as name
            // from trainee_course join trainee
            // where trainee_course.trainee_id=trainee.id
            // and trainee_course.batch_id=:id";

            $sql="SELECT trainee_course.id as id,trainee.name
            from trainee_course join trainee
            on trainee_course.trainee_id=trainee.id
            group by trainee_course.trainee_id";
            $statement=$con->prepare($sql);
            
            if($statement->execute()){
                $result=$statement->fetchALL(PDO::FETCH_ASSOC);
                return $result;
            }
        }

}
?>