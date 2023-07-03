<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$train_controller=new traineeController();


if(isset($_POST['submit'])){
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
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Students</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Remark</label>
                                    <input type="text" name="remark" class="form-control">
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