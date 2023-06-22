<?php
include_once __DIR__.'/../controller/batchController.php';
$id=$_POST['id'];

$bat_con=new batchController();
$result=$bat_con->deleteBatch($id);
if($result){
    echo "success";
}
else
{
    echo "Can't delete with child data";
}
?>