<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/trainee_courseController.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/projectTraineeController.php';

$id=$_GET['id'];
$project_train=new projectTraineeController();
$project=$project_train->getProjectTraineeojts($id);
var_dump($project);
echo "<br>";

$batch_con=new ProjectController();
$batch=$batch_con->getProjectojts($id);
var_dump($batch);
echo "<br>";

$pid=$batch['batch_id'];

$train_con=new train_cosController();
$trainees=$train_con->gettraineeByBatchs($pid);
var_dump($trainees);

// $trainees=$project_train->getTraineeByProject($bname);

if(isset($_POST['add'])){
    $project=$project_train->getProjectTraineeojts($id);
    $pname=$project['project_id'];
    $status=$project['status'];
    $trainee=$_POST['trainee'];
    var_dump($trainee);
    echo "<br>";
    $trainees=$project_train->gettraineecourse($trainee);
    var_dump($pname,$status,$trainees);
    $result=$project_train->addojt($pname,$trainees,$status);
    if($result){
        $response=$project['project_id'];
        echo "<script>location.href='project_trainee.php?status=".$response."'</script>";
    }    
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add More Trainee</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Project Title: <?php echo $project['project_id'] ?></p>
                            <p>Project Date: <?php echo $project['trainee_course_id'] ?></p>
                            <p>Project Rate: <?php echo $project['status'] ?></p>
                        </div>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">


					            <div>
                                    <div class="project">
                                    <div class="row">
                                        <div class="col-md-10">
                                        <label for="" class="form-label">Trainee Name</label>
                                        <select name="trainee[]" id="trainee0" class="form-select">
                                        <?php
                                        foreach($trainees as $trainee){
                                            echo "<option value=".$trainee['trainee_id'].">". $trainee['name']."</option>";
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <div class="col-md-2 mt-4" id="<?php echo $project_id; ?>">
                                            <button class="btn btn-primary addmore1">Add More</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                    <div class="row mt-3">
                        <col-md-3>
                        <button class="btn btn-success" name="add">Add</button>
                    </col-md-3>
                    </div>
                    </form>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>