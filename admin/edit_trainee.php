<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$id=$_GET['id'];
$train_controller=new traineeController();
$trainees=$train_controller->getTraineeInfoAdmin($id);

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $education=$_POST['education'];
    $remark=$_POST['remark'];
    $result=$train_controller->updateTrainee($id,$name,$email,$phone,$city,$education,$remark);
    if($result){
        echo '<script>location.href="trainee.php"</script>';
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
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $trainees['name'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $trainees['email'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $trainees['phone'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $trainees['city'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php echo $trainees['education'] ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Remark</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $trainees['remark'] ?>">
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