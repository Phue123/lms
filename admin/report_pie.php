<?php
include_once __DIR__."/../controller/trainee_courseController.php";

$train_cos=new train_cosController();
$total=$train_cos->NoOfTrainee();

echo json_encode($total);
?>