<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$id=$_GET['id'];
$train_controller=new traineeController();
$trainees=$train_controller->getTraineeInfoAdmin($id);

if(isset($_POST['update'])){
    if(empty($_POST['name'])){
        $nameerror="Please fill trainee name";
    }else{
        $name=$_POST['name'];
    }

    if(empty($_POST['email'])){
        $emailerror="Please fill trainee email";
    }else{
        $email=$_POST['email'];
    }

    if(empty($_POST['phone'])){
        $phoneerror="Please fill trainee phone";
    }else{
        $phone=$_POST['phone'];
    }

    if(empty($_POST['city'])){
        $cityerror="Please fill city name";
    }else{
        $city=$_POST['city'];
    }

    if(empty($_POST['education'])){
        $eduerror="Please fill trainee's education";
    }else{
        $education=$_POST['education'];
    }

    if(empty($_POST['remark'])){
        $remarkerror="Please fill remark";
    }else{
        $remark=$_POST['reamrk'];
    }

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['city']) || empty($_POST['education']) || empty($_POST['remark'])){
        $error=true;
    }else{
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
                                    <?php if(isset($error) && isset($nameerror)) echo '<span class="text-danger">'.$nameerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $trainees['email'] ?>">
                                    <?php if(isset($error) && isset($emailerror)) echo '<span class="text-danger">'.$emailerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $trainees['phone'] ?>">
                                    <?php if(isset($error) && isset($phoneerror)) echo '<span class="text-danger">'.$phoneerrore.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $trainees['city'] ?>">
                                    <?php if(isset($error) && isset($cityerror)) echo '<span class="text-danger">'.$cityerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php echo $trainees['education'] ?>">
                                    <?php if(isset($error) && isset($eduerror)) echo '<span class="text-danger">'.$eduerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Remark</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $trainees['remark'] ?>">
                                    <?php if(isset($error) && isset($remarkerror)) echo '<span class="text-danger">'.$remarkerror.'</span>' ?>
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