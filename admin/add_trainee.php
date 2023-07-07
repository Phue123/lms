<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$train_controller=new traineeController();


if(isset($_POST['submit'])){
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
    $result=$train_controller->addTraineeAdmin($name,$email,$phone,$city,$education,$remark);
    {
        echo '<script>location.href="trainee.php?result='.$result.'"</script>';
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
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <?php if(isset($error) && isset($nameerror)) echo '<span class="text-danger">'.$nameerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>">
                                    <?php if(isset($error) && isset($emailerror)) echo '<span class="text-danger">'.$emailerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)) echo $phone; ?>">
                                    <?php if(isset($error) && isset($phoneerror)) echo '<span class="text-danger">'.$phoneerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="<?php if(isset($city)) echo $city; ?>">
                                    <?php if(isset($error) && isset($cityerror)) echo '<span class="text-danger">'.$cityerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php if(isset($education)) echo $education; ?>">
                                    <?php if(isset($error) && isset($eduerror)) echo '<span class="text-danger">'.$eduerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Remark</label>
                                    <input type="text" name="remark" class="form-control" value="<?php if(isset($remark)) echo $remark; ?>">
                                    <?php if(isset($error) && isset($remarkerror)) echo '<span class="text-danger">'.$remarkerror.'</span>' ?>
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