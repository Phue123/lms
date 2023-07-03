<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';
include_once __DIR__.'/../controller/studentController.php';
include_once __DIR__.'/../controller/trainee_courseController.php';

$batch_con=new batchController();
$batches=$batch_con->getBatchInfoTraineeCourses();
$train_con=new StudentController();
$trainees=$train_con->getStudentList();
$trains_con=new train_cosController();

if(isset($_POST['submit'])){
    $bname=$_POST['bname'];
    $trainee_id=$_POST['trainee_id'];
    $joined_date=$_POST['joined_date'];
    $status=$_POST['status'];
    $result=$trains_con->addTrainCourse($bname,$trainee_id,$joined_date,$status);
    {
        echo '<script>location.href="trainee_course.php?result='.$result.'"</script>';
    }
}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Category</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="bname" id="bname" class="form-select">
                                        <option disabled selected>--Select Batch Name--</option>
                                        <?php
                                        foreach($batches as $batch){
                                            echo '<option value='.$batch['id'].'>'.$batch['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Name</label>
                                    <select name="trainee_id" id="tname" class="form-select">
                                    <option disabled selected>--Select Trainee Name--</option>
                                        <?php
                                        foreach($trainees as $trainee){
                                            echo '<option value='.$trainee['id'].'>'.$trainee['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Joined Date</label>
                                    <input type="date" name="joined_date" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>