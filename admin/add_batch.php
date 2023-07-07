<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/batchController.php';

$course_con=new CourseController();
$courses=$course_con->getCoursesInfoBatch();

$batch_con=new batchController();
if(isset($_POST['submit'])){
    // $name=$_POST['name'];
    // $start_date=$_POST['start_date'];
    // $duration=$_POST['duration'];
    // $fee=$_POST['fee'];
    // $discount=$_POST['discount'];
    // $course_id=$_POST['course_id'];
    // $status=$batch_con->addBatches($name,$start_date,$duration,$fee,$discount,$course_id);
    // if($status){
    //     echo '<script>location.href="batch.php?status='.$status.'"</script>';
    // }
}

if(isset($_POST['submit'])){
    
    if(empty($_POST['name'])){
    $nameerror="Please fill your name";
    }else{
        $name=$_POST['name'];
    }

    if(empty($_POST['start_date'])){
    $dateerror="Please fill your date";
    }else{
    $start_date=$_POST['start_date'];
    }

    if(empty($_POST['duration'])){
    $durationerror="Please fill your duration";
     }else{
    $duration=$_POST['duration'];
    }

    if(empty($_POST['fee'])){
    $feeerror="Please fill your fee";
    }else{
    $fee=$_POST['fee'];
    }

    if(empty($_POST['discount'])){
    $discounterror="Please fill your discount";
    }else{
    $discount=$_POST['discount'];
    }

    if(empty($_POST['course_id'])){
    $course_iderror="Please fill your course name";
    }else{
    $course_id=$_POST['course_id'];
    }

    if(empty($_POST['name']) || empty($_POST['start_date']) || empty($_POST['duration']) || empty($_POST['fee']) || empty($_POST['discount']) || empty($_POST['course_id']))
    {
        
        $error=true;
    }
    else
    {
    $name=$_POST['name'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $fee=$_POST['fee'];
    $discount=$_POST['discount'];
    $course_id=$_POST['course_id'];
    $status=$batch_con->addBatches($name,$start_date,$duration,$fee,$discount,$course_id);
    if($status){
        echo '<script>location.href="batch.php?status='.$status.'"</script>';
    }
    }
    
}


?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Batch</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($nameerror)) echo $nameerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php if(isset($start_date)) echo $start_date; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($dateerror)) echo $dateerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Duration</label>
                                    <input type="text" name="duration" class="form-control" value="<?php if(isset($duration)) echo $duration    ; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($durationerror)) echo $durationerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Fee</label>
                                    <input type="text" name="fee" class="form-control" value="<?php if(isset($fee)) echo $fee; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($feeerror)) echo $feeerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Discount</label>
                                    <input type="text" name="discount" class="form-control" value="<?php if(isset($discount)) echo $discount; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($discounterror)) echo $discounterror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Name</label>
                                    <select name="course_id" class="form-select">
                                        <option value="" selected disabled>--SELECT COURSE--</option>
                                        <?php
                                        foreach($courses as $course){
                                            ?>
                                            <option value="<?php echo $course['id'] ?>" 
                                            <?php if(isset($_POST['course_id']) ==$course['id'])
                                                    echo 'selected'; 
                                                   ?>>
                                            <?php echo $course['name']; ?>
                                            </option>;
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php if(isset($error) && isset($course_iderror)) echo $course_iderror; ?></span>
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