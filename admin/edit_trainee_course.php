<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/trainee_courseController.php';
include_once __DIR__.'/../controller/batchController.php';
include_once __DIR__.'/../controller/traineeController.php';

$batch_con=new batchController();
$batches=$batch_con->getBatchInfoTraineeCourses();

$train_con=new traineeController();
$traineees=$train_con->getTraineeAdmin();

$id=$_GET['id'];
$train_controller=new train_cosController;
$trainees=$train_controller->getTrainCourseAdmins($id);
var_dump($trainees);

if(isset($_POST['update'])){
    $bname=$_POST['bname'];
    $tname=$_POST['tname'];
    $joined_date=$_POST['joined_date'];
    $status=$_POST['status'];
    $result=$train_controller->updateTraineeCourse($id,$bname,$tname,$joined_date,$status);
    if($result){
        echo '<script>location.href="trainee_course.php"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Students</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="bname" id="" class="form-select">
                                    <option value="<?php echo $trainees['batch_id']; ?>"><?php echo $trainees['bname']; ?></option>
                                    <?php
                                    foreach($batches as $batch){
                                        echo "<option value=".$batch['id'].">". $batch['name']."</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee name</label>
                                    <select name="tname" id="" class="form-select">
                                    <option value="<?php echo $trainees['trainee_id']; ?>"><?php echo $trainees['tname']; ?></option>
                                    <?php
                                    foreach($traineees as $traineee){
                                        echo "<option value=".$traineee['id'].">". $traineee['name']."</option>";
                                    }
                                    ?>
                                    </select>                                    
                                </div>
                                <div>
                                    <label for="" class="form-label">Joined date</label>
                                    <input type="text" name="joined_date" class="form-control" value="<?php echo $trainees['joined_date'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control" value="<?php echo $trainees['status'] ?>">
                                </div>
                                
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>