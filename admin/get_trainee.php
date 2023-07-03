<?php

include_once __DIR__.'/../controller/trainee_courseController.php';

$id=$_POST['id'];
$trainee_cos=new train_cosController();
$trainee_courses=$trainee_cos->gettraineeByBatchs($id);

$html="";
$html.="<div class='row my-3'>";
$html.="<div class='col-md-8'>";

$html.="<select name='trainee[]' class='form-select'>" ;
foreach($trainee_courses as $trainee){
    $html.="<option value='".$trainee['trainee_id']."'>".$trainee['name']."</option>";
}
$html.="</select>";
$html.="</div>";
$html.="<div class='col-md-3'><button class='btn btn-danger removebtn'>Remove</button></div>";
$html.="</div>";

echo $html;
?>