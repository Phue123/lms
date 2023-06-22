<?php
include_once __DIR__.'/../controller/courseController.php';
$id=$_POST['id'];

$cos_con=new Coursecontroller();
$result=$cos_con->deleteCourse($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with child data";
}
?>