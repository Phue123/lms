<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/trainee_courseController.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/projectTraineeController.php';

$project_train=new projectTraineeController();

$id=$_GET['id'];
$project_con=new ProjectController();
$project=$project_con->getProjectojts($id);

$pid=$project['batch_id'];

$train_con=new train_cosController();
$trainees=$train_con->gettraineeByBatchs($pid);


?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add More Trainee</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Project Title: <?php echo $project['title'] ?></p>
                            <p>Project Date: <?php echo $project['start_date'] ?></p>
                            <p>Project Rate: <?php echo $project['rate'] ?></p>
                            <p>Project Batch Name: <?php echo $project['bname'] ?></p>
                        </div>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">

					<div class="rows">
                    <div class="row">
                        <div class="col-md-8">
                                
                                    <label for="" class="form-label">Trainee Name</label>
                                    <select name="trainee[]" id="" class="form-select">
                                        <?php
                                        foreach($trainees as $trainee){
                                            echo "<option value=".$trainee['trainee_id'].">". $trainee['name']."</option>";
                                        }
                                        ?>
                                    </select>
                        </div>
                                <div class="col-md-4 mt-3" id="<?php echo $pid; ?>">
                                    <button class="btn btn-dark addmore">Add More</button>
                                </div>
                    </div>
                    </div>

                    <div class="row my-3">
                        <col-md-2>
                        <button class="btn btn-success" name="add">Add</button>
                    </col-md-2>
                    </div>
                    </form>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>