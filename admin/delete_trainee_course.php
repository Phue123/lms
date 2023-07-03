<?php
include_once __DIR__.'/../controller/trainee_courseController.php';
$id=$_POST['id'];

$train_con=new train_cosController;
$result=$train_con->deleteTraineeCourse($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with its child data";
}
?>