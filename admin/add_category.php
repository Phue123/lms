<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
if(isset($_POST['submit']))
{
    if(empty($_POST['name'])){
        $nameerror="Please fill category name";
    }
    else
    {
        $name=$_POST['name'];
    }

    if(empty($_POST['name'])){
        $error=true;
    }else
    {
    $name=$_POST['name'];
    $status=$cat_controller->addCategory($name);
    if($status){
        echo '<script>location.href="category.php?status='.$status.'"</script>';
    }
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
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($nameerror)) echo $nameerror; ?></span>
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