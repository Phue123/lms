<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/projectTraineeController.php';
include_once __DIR__.'/../controller/trainee_courseController.php';

$project_con=new ProjectController();
$projects=$project_con->getProjectes();

$trainee_cos=new train_cosController();
$trainee_courses=$trainee_cos->gettrainees();

$project_train=new projectTraineeController();

if(isset($_POST['submit'])){
    $project_id=$_POST['project_id'];
    $status=$_POST['status'];
    $trainees=$_POST['trainee_course_id'];
    $status=$project_train->addProjectTrainee($project_id,$trainees,$status);
    if($status){
        echo '<script>location.href="project_trainee.php"</script>';
    }
}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add More Project Trainee</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>
                                <div>
                                    <label for="" class="form-label">Project Name</label>
                                    <select name="project_id" id="" class="form-select">
                                        <?php
                                        foreach($projects as $project){
                                            echo "<option value=".$project['id'].">". $project['title']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div>
                                    <div id="trainee">
                                    <div class="row">
                                        <div class="col-md-10">
                                        <label for="" class="form-label">Trainee Name</label>
                                        <select name="trainee_course_id[]" id="trainee_course_id0" class="form-select">
                                        <?php
                                        foreach($trainee_courses as $trainee_course){
                                            echo "<option value=".$trainee_course['id'].">". $trainee_course['name']."</option>";
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <div class="col-md-2 mt-4">
                                            <button class="btn btn-primary" id="addmore" name="addmore">Add More</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>