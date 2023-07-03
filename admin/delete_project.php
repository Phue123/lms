<?php
include_once __DIR__.'/../controller/projectController.php';
$id=$_POST['id'];

$project_con=new ProjectController();
$result=$project_con->deleteProject($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with its child data";
}
?>