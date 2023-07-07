<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
$categories=$cat_controller->getCategorysAdmin();


$id=$_GET['id'];
$course_controller=new CourseController();
$courses=$course_controller->getCourseInfoAdmin($id);

if(isset($_POST['update'])){
    if(empty($_POST['name'])){
        $nameerror="Please fill course name";
    }else{
        $name=$_POST['name'];
    }

    if(empty($_POST['cat_id'])){
        $cat_iderror="Please choose category name";
    }else{
        $cat_id=$_POST['cat_id'];
    }

    if(empty($_POST['outline'])){
        $outlineerror="Please fill course outline";
    }else{
        $outline=$_POST['outline'];
    }

    if(!empty($_FILES['image']['name'])){

    $filename=$_FILES['image']['name'];
    $filetype=$_FILES['image']['type'];
    $filesize=$_FILES['image']['size'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $file_extension=explode('.',$filename);
    $actual_extension=end($file_extension);
    $allowed_files=['png','jpg','jpeg','svg'];
    $max_size=500000;
    if(in_array(strtolower($actual_extension),$allowed_files))
    {
        if($filesize>=$max_size)
        {
            $imageerror="File size must be less than 5 MB";
        }else
        {
            $image=$_FILES['image'];
        }
    }else
    {
        $imageerror="File is not allowed";
    }

   }else{
    $imageerror='Please select course image';
   }

    if(empty($_POST['name']) || empty($_POST['cat_id']) || empty($_POST['outline']) || empty($_POST['image']['name'])){
       $error=true;
    }else{
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
                                    <span class="text-danger"><?php if(isset($error) && isset($nameerror)) echo $nameerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category</label>
                                    <select name="cat_id" id="" class="form-select">

                                        <?php
                                        
                                        foreach($categories as $category){
                                            ?>

                                            <option value="<?php echo $category['id'] ?>"
                                            <?php
                                            if(isset($_POST['cat_id'])){
                                                if($_POST['cat_id'] == $category['id'])
                                                echo 'selected';
                                            }else{
                                                if($courses['cat_id'] == $category['id'])
                                                echo 'selected';
                                            }  
                                            ?>>
                                            <?php echo $category['name']; ?>
                                            </option>

                                            <?php
                                            }
                                        
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php if(isset($error) && isset($cat_iderror)) echo $cat_iderror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"><?php echo $courses['outline']; ?></textarea>
                                    <span class="text-danger"><?php if(isset($error) && isset($outlineerror)) echo $outlineerror; ?></span>
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