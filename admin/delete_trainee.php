<?php
include_once __DIR__.'/../controller/traineeController.php';
$id=$_POST['id'];

$train_con=new TraineeController();
$result=$train_con->deleteTrainee($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with its child data";
}
?>