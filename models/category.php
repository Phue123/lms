<?php
include_once __DIR__.'/../vendor/db/db.php';

class Category{

    public function getCategoriesList(){
        //1.db connect
        $con=Database::connect();//Database (db.php class name)
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//catch error
        //2.write sql
        $sql="SELECT category.name as name,count(cat_id)as total from category join course where category.id=course.cat_id group by cat_id";
        //$sql="select name from category";
        $statement=$con->prepare($sql);
        //3.sql execute
        if($statement->execute()){
            //4.result
            //date fetchall=>one row, fetchAll=>multiple row
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getCategoryAdmin(){
        //1.db connect
        $con=Database::connect();//Database (db.php class name)
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//catch error
        //2.write sql
        $sql="select * from category";
        $statement=$con->prepare($sql);
        //3.sql execute
        if($statement->execute()){
            //4.result
            //date fetchall=>one row, fetchAll=>multiple row
            $result=$statement->fetchALL(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    // public function getCourse(){
    //     //1.db connect
    //     $con=Database::connect();//Database (db.php class name)
    //     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//catch error
    //     //2.write sql
    //     $sql="select name from course";
    //     $statement=$con->prepare($sql);
    //     //3.sql execute
    //     if($statement->execute()){
    //         //4.result
    //         //date fetchall=>one row, fetchAll=>multiple row
    //         $result=$statement->fetchALL(PDO::FETCH_ASSOC);
    //     }
    //     return $result;
    // }

    public function createCategory($name){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT into category(name) values (:name)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getCategoriesInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from category where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        if($statement->execute()){
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;

        }
    }
    public function updateCategory($id,$name){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="Update category Set name=:name where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteCategoryInfo($id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="DELETE from category where id=:id";
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

}
?>