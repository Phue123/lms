<?php
include_once __DIR__.'/../controller/trainee_courseController.php';

$trainee_cos=new train_cosController();
$trainee_courses=$trainee_cos->gettrainees();

echo json_encode($trainee_courses);
?>