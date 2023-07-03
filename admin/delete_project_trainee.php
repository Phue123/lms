<?php
include_once __DIR__.'/../controller/projectTraineeController.php';
$id=$_POST['id'];

$project_con=new projectTraineeController;
$result=$project_con->deleteProjectTrainee($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with its child data";
}
?>