<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
$categories=$cat_controller->getCategorysAdmin();

$cos_controller=new CourseController();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $cat_id=$_POST['cat_id'];
    $outline=$_POST['outline'];
    $status=$cos_controller->addCourse($name,$cat_id,$outline);
    if($status){
        echo '<script>location.href="course.php?status='.$status.'"</script>';
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add More Course</h1>

					<div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category</label>
                                    <select name="cat_id" id="" class="form-select">
                                        <?php
                                        foreach($categories as $category){
                                            echo "<option value=".$category['id'].">". $category['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"></textarea>
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