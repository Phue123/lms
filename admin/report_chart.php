<?php
include_once __DIR__."/../controller/batchController.php";

$batch_con=new batchController();
$batchperyear=$batch_con->batchPerYear();

echo json_encode($batchperyear);
?>