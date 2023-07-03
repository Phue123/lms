<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
$categories=$cat_controller->getCategorysAdmin();


$id=$_GET['id'];
$course_controller=new CourseController();
$courses=$course_controller->getCourseInfoAdmin($id);
var_dump($courses);

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $cat_id=$_POST['cat_id'];
    $outline=$_POST['outline'];
    $image=$_FILES['image'];
    $status=$course_controller->updateCourse($id,$name,$cat_id,$outline,$image);
    if($status){
        $message=2;
        echo '<script>location.href="course.php?status='.$message.'"</script>';
    }
}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Course</h1>

					<div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $courses['name']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category</label>
                                    <select name="cat_id" id="" class="form-select">
                                        <option value="<?php echo $courses['cat_id']; ?>"><?php echo $courses['catname']; ?></option>
                                        
                                        <?php
                                        
                                        foreach($categories as $category){
                                            echo "<option value=".$category['id'].">". $category['name']."</option>";
                                            }
                                        
                                        ?>
                                    </select>

                                </div>
                                <div>
                                    <label for="" class="form-label">Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"><?php echo $courses['outline']; ?></textarea>
                                </div>
                                <div class="mt-3">
                                    <img src="../uploads/<?php echo $courses['image']; ?>" width="100px" height="100px" alt="">
                                </div>
                                <div>
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
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