<?php

include_once __DIR__.'/../controller/projectTraineeController.php';

$id=$_POST['id'];
$project_train=new projectTraineeController();
$projects=$project_train->getTraineeByProjects($id);

$html="";
$html.="<div class='row my-3'>";
$html.="<div class='col-md-8'>";

$html.="<select name='trainee[]' class='form-select'>" ;
foreach($projects as $project){
    $html.="<option value='".$project['project_id']."'>".$project['tname']."</option>";
}
$html.="</select>";
$html.="</div>";
$html.="<div class='col-md-3'><button class='btn btn-danger removebtn'>Remove</button></div>";
$html.="</div>";

echo $html;
?>