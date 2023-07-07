<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/instructorController.php';

$id=$_GET['id'];
$ins_controller=new InstructorController();
$instructors=$ins_controller->getInstructorInfoAdmin($id);

if(isset($_POST['update'])){
    if(empty($_POST['name'])){
        $nameerror="Please fill instructor name";
    }else{
        $name=$_POST['name'];
    }

    if(empty($_POST['email'])){
        $emailerror="Please fill instructor's email";
    }else{
        $email=$_POST['email'];
    }

    if(empty($_POST['phone'])){
        $phoneerror="Please fill instructor's phone";
    }else{
        $phone=$_POST['phone'];
    }

    if(empty($_POST['address'])){
        $addresserror="Please fill your address";
    }else{
        $address=$_POST['address'];
    }

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address'])){
        $error=true;
    }else{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $status=$ins_controller->UpdateInstructors($id,$name,$email,$phone,$address);
    if($status){
        echo '<script>location.href="instructor.php"</script>';
    }
}
}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Instructors</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $instructors['name'] ?>">
                                    <?php if(isset($error) && isset($nameerror)) echo '<span class="text-danger">'.$nameerror.'</span>';  ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $instructors['email'] ?>">
                                    <?php if(isset($error) && isset($emailerror)) echo '<span class="text-danger">'.$emailerror.'</span>';  ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $instructors['phone'] ?>">
                                    <?php if(isset($error) && isset($phoneerror)) echo '<span class="text-danger">'.$phoneerror.'</span>';  ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $instructors['address'] ?>">
                                    <?php if(isset($error) && isset($addresserror)) echo '<span class="text-danger">'.$addresserror.'</span>';  ?>
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