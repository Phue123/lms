<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/projectTraineeController.php';
include_once __DIR__.'/../controller/trainee_courseController.php';

$project_con=new ProjectController();
$projects=$project_con->getProjectes();
var_dump($projects);
echo "<br>";

$trainee_cos=new train_cosController();
$trainee_courses=$trainee_cos->gettrainees();
var_dump($trainee_courses);

$project_train=new projectTraineeController();

if(isset($_POST['submit'])){
    if(empty($_POST['project_id'])){
        $project_iderror="Please select project name";
    }else{
        $project_id=$_POST['project_id'];
    }

    if(empty($_POST['trainee_course_id'])){
        $tcerror="Please select trainee course name";
    }else{
        $trainee_course_id=$_POST['trainee_course_id'];
    }

    if(empty($_POST['status'])){
        $statuserror="Please fill project status";
    }else{
        $status=$_POST['status'];
    }

    if(empty($_POST['project_id']) || empty($_POST['trainee_course_id']) || empty($_POST['status'])){
        $error=true;
    }else{
    $project_id=$_POST['project_id'];
    $status=$_POST['status'];
    $trainees=$_POST['trainee_course_id'];
    $status=$project_train->addProjectTrainee($project_id,$trainees,$status);
    if($status){
        echo '<script>location.href="project_trainee.php"</script>';
    }
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
                                        <option value="" disabled selected>--SELECT PROJECT--</option>
                                        <?php
                                        foreach($projects as $project)
                                        {
                                        ?>
                                        <option value="<?php echo $project['id'] ?>" 
                                        <?php if(isset($_POST['project_id']) == $project['id'])
                                                echo 'selected'; 
                                               ?>>
                                        <?php echo $project['name']; ?>
                                        </option>;
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php if(isset($error) && isset($project_iderror)) echo '<span class="text-danger">'.$project_iderror.'</span>' ?>
                                </div>

                                <div>
                                    <div id="trainee">
                                    <div class="row">
                                        <div class="col-md-10">
                                        <label for="" class="form-label">Trainee Name</label>
                                        <select name="trainee_course_id[]" id="trainee_course_id0" class="form-select">
                                        <option value="" disabled selected>--SELECT TRAINEE--</option>
                                        <?php
                                        foreach($trainee_courses as $trainee_course){
                                        ?>
                                        <option value="<?php echo $trainee_course['id'] ?>" 
                                        <?php if(isset($_POST['trainee_course_id']) == $trainee_course['id'])
                                                echo 'selected'; 
                                               ?>>
                                        <?php echo $trainee_course['name']; ?>
                                        </option>;
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        <?php if(isset($error) && isset($tcerror)) echo '<span class="text-danger">'.$tcerror.'</span>' ?>
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
                                    <?php if(isset($statuserror) && isset($statuserror)) echo '<span class="text-danger">'.$statuserror.'</span>' ?>
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