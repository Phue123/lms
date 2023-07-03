<?php
include_once __DIR__.'/../controller/categoryController.php';
$id=$_POST['id'];

$cat_con=new Categorycontroller();
$result=$cat_con->deleteCategory($id);
if($result){
    echo "Success";
}
else
{
    echo "Can't delete with child data";
}
?>