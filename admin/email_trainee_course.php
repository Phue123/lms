<?php

include_once __DIR__.'/../controller/trainee_courseController.php';

$id=$_GET['id'];
$train_con=new train_cosController();
$status=$train_con->mailTrainee($id);
if($status){
    $message=3;
    echo '<script>location.href="trainee_course.php?status='.$message.'"</script>';
}


?>