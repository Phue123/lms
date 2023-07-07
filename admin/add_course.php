<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
$categories=$cat_controller->getCategorysAdmin();

$cos_controller=new CourseController();

if(isset($_POST['submit'])){
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

    if(empty($_POST['name']) || empty($_POST['cat_id']) || empty($_POST['outline']) || empty($_FILES['image']['name'])){
        $error=true;
    }else{
    $name=$_POST['name'];
    $cat_id=$_POST['cat_id'];
    $outline=$_POST['outline'];
    $image=$_FILES['image'];
    //var_dump($image);
     $status=$cos_controller->addCourse($name,$cat_id,$outline,$image);
    if($status){
        echo '<script>location.href="course.php?status='.$status.'"</script>';
    }
}
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add More Course</h1>

					<div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <span class="text-danger"><?php if(isset($error) && isset($nameerror)) echo $nameerror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category</label>
                                    <select name="cat_id" id="" class="form-select">
                                        <option value="" disabled selected>--Select Course--</option>
                                        <?php
                                        foreach($categories as $category){
                                            ?>
                                            <option value="<?php echo $category['id'] ?>" 
                                            <?php if(isset($_POST['cat_id']) ==$category['id'])
                                                    echo 'selected'; 
                                                   ?>>
                                            <?php echo $category['name']; ?>
                                            </option>;
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php if(isset($error) && isset($cat_iderror)) echo $cat_iderror; ?></span>
                                </div>
                                <div>
                                    <label for="" class="form-label">Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"><?php if(isset($outline)) echo $outline; ?></textarea>
                                    <span class="text-danger"><?php if(isset($error) && isset($outlineerror)) echo $outlineerror; ?></span>
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Course Featured Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <span class="text-danger"><?php if(isset($error) && isset($imageerror)) echo $imageerror; ?></span>
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