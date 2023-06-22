<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/batchController.php';

$id=$_GET['id'];

$batch_con=new batchController();
$batches=$batch_con->getBatchInfo($id);

$course_con=new CourseController();
$courses=$course_con->getCoursesInfoBatch();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $fee=$_POST['fee'];
    $discount=$_POST['discount'];
    $course_id=$_POST['course_id'];
    $status=$batch_con->updateBatch($id,$name,$start_date,$duration,$fee,$discount,$course_id);
    if($status){
        echo '<script>location.href="batch.php?status='.$status.'"</script>';
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
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $batches['name']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php echo $batches['start_date']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Duration</label>
                                    <input type="text" name="duration" class="form-control" value="<?php echo $batches['duration']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Fee</label>
                                    <input type="text" name="fee" class="form-control" value="<?php echo $batches['fee']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Discount</label>
                                    <input type="text" name="discount" class="form-control" value="<?php echo $batches['discount']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Name</label>
                                    <select name="course_id" class="form-select">
                                        <?php
                                        foreach($courses as $course){
                                            if($batches['course_id']==$course['id'])
                                            {
                                                 echo "<option value='".$course['id']."' selected>". $course['name']."</option>";
                                            }else
                                            {
                                                echo "<option value='".$course['id']."'>". $course['name']."</option>";

                                            }
                                        }
                                        ?>
                                    </select>
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