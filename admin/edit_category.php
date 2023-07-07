<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';

$id=$_GET['id'];
$cat_controller=new Categorycontroller();
$category=$cat_controller->getCategoryInfoAdmin($id);

if(isset($_POST['update'])){
    if(empty($_POST['name'])){
        $nameerror="Please fill your name";
    }else{
        $name=$_POST['name'];
    }

    if(empty($_POST['name'])){
        $error=true;
    }
    else{
    $name=$_POST['name'];
    $status=$cat_controller->updateCategoryAdmin($id,$name);
    if($status){
        $message=2;
        echo '<script>location.href="category.php?status='.$message.'"</script>';
    }
}
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Category</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $category['name'] ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($nameerror)) echo $nameerror; ?></span>
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