<?php
include_once __DIR__.'/../vendor/db/db.php';

class Course{

    public function getCoursesList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT table1.batchid as batch_id,table1.cosname as cosname,table1.price as price,table2.instructorname as instructorname,table3.total as total
        FROM
        (SELECT count(batch_id) as total,batch_id
         from trainee_course
        GROUP by batch_id)as table3 join
        
        (SELECT batch.id as batchid,course.name as cosname,batch.fee as price
        from course join batch 
         WHERE course.id=batch.course_id)as table1 JOIN
         
        (SELECT course_instructor.batch_id as batchid,instructor.name as instructorname
        FROM course_instructor JOIN instructor
         WHERE course_instructor.instructor_id=instructor.id)as table2
         WHERE table1.batchid=table2.batchid
         and table3.batch_id=table1.batchid";
         
        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchall(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getCoursesAdmin(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT course.id as id,course.name as name,category.name as cat_id,course.outline as outline
        from course join category
        where course.cat_id=category.id";

        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchall(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createCourse($name,$cat_id,$outline){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT into course(name,cat_id,outline) value(:name,:cat_id,:outline)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':cat_id',$cat_id);
        $statement->bindParam(':outline',$outline);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function getCourseInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT course.id as id,course.name as name,course.cat_id as cat_id,category.name as catname,course.outline as outline
        from course join category
        where course.cat_id=category.id
        and course.id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;

        }
    }

    public function setCourses($id,$name,$cat_id,$outline){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE course set name=:name,cat_id=:cat_id,outline=:outline where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':cat_id',$cat_id);
        $statement->bindParam(':outline',$outline);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteCourseInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="DELETE from course where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        try{
            $statement->execute();
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function getCourseInfoBatch(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="select * from course";
        $statement=$con->prepare($sql);
        if($statement->execute()){
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
?>