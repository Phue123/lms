<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectTraineeController.php';
include_once __DIR__.'/../controller/trainee_courseController.php';

$id=$_GET['id'];
$project_con=new projectTraineeController();
$details=$project_con->getdetails($id);

$trainee_cos=new train_cosController();
$trainee_courses=$trainee_cos->gettrainees();

if(isset($_POST['update'])){
    $project_id=$details['project_id'];
    $tcid=$details['tcid'];
    $status=$_POST['status'];
    $result=$project_con->updatetrainee($id,$project_id,$tcid,$status);
    if($status){
        $message=4;
        echo '<script>location.href="project_trainee.php?status='.$message.'"</script>';
    }
}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Project Details</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Project Name: <?php echo $details['title'] ?></p>
                            <p>Trainee Name: <?php echo $details['tname'] ?></p>
                            <p>Status: <?php echo $details['status'] ?></p>
                        </div>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="row my-3">
                        <div class="col-md-10">
                            <div>
                                <label for="" class="form-label">Trainee Name</label>
                                <input type="text" name="tname" class="form-control" value="<?php echo $details['tname']; ?>">
                            </div>
                            <div>
                                <label for="" class="form-label">Status</label>
                                <input type="text" name="status" class="form-control" value="<?php echo $details['status'] ?>">
                            </div>
                        </div>
                        <div class="mt-3">
                        <button class="btn btn-success" name="update">Update</button>
                        </div>
                    </col-md-2>
                    </div>
                    </form>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>