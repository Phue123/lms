<?php
include_once __DIR__.'/../controller/instructorController.php';
$id=$_POST['id'];

$ins_con=new InstructorController();
$result=$ins_con->deleteInstructor($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with its child data";
}
?>