<?php


include_once __DIR__.'/../controller/traineeController.php';

$id=$_GET['id'];
$train_con=new traineeController();
$status=$train_con->mailTrainee($id);
if($status){
    $message=3;
    echo '<script>location.href="trainee.php?status='.$message.'"</script>';
}


?>