<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/batchController.php';

$batch_con=new batchController();
$batches=$batch_con->getBatchInfoTraineeCourses();

$id=$_GET['id'];
$project_con=new ProjectController();
$projects=$project_con->getProjectedits($id);

if(isset($_POST['update'])){
    if(empty($_POST['title'])){
        $titleerror="Please fill project title";
    }else{
        $title=$_POST['title'];
    }

    if(empty($_POST['start_date'])){
        $dateerror="Please fill start date";
    }else{
        $start_date=$_POST['start_date'];
    }

    if(empty($_POST['rate'])){
        $rateerror="Please fill project rate";
    }else{
        $rate=$_POST['rate'];
    }

    if(empty($_POST['batch_id'])){
        $batch_iderror="Please fill batch name";
    }else{
        $batch_id=$_POST['batch_id'];
    }

    if(empty($_POST['title']) || empty($_POST['start_date']) || empty($_POST['rate']) || empty($_POST['batch_id'])){
        $error=true;
    }else{
    $title=$_POST['title'];
    $start_date=$_POST['start_date'];
    $rate=$_POST['rate'];
    $batch_id=$_POST['batch_id'];
    $status=$project_con->updateProject($id,$title,$start_date,$rate,$batch_id);
        if($status){
        $message=2;
        echo "<script>location.href='project.php?status=".$message."'</script>";

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
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $projects['title']; ?>">
                                    <?php if(isset($error) && isset($titleerror)) echo '<span class="text-danger">'.$titleerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php echo $projects['start_date']; ?>">
                                    <?php if(isset($error) && isset($dateerror)) echo '<span class="text-danger">'.$dateerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Rate</label>
                                    <input type="text" name="rate" class="form-control" value="<?php echo $projects['rate']; ?>">
                                    <?php if(isset($error) && isset($rateerror)) echo '<span class="text-danger">'.$rateerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="batch_id" id="" class="form-select">
                                        <option value="" disabled selected>--SELECT BATCH--</option>
                                        <?php
                                        foreach($batches as $batch){
                                        ?>
                                        <option value="<?php echo $batch['id'] ?>"
                                        <?php
                                        if(isset($batch_id)){
                                           if($batch_id == $batch['id'])
                                           echo 'selected';
                                        }else{
                                            if($projects['id'] == $batch['id'])
                                            echo "selected";
                                        }
                                        ?>
                                        ><?php echo $batch['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php if(isset($error) && isset($batch_iderror)) echo '<span class="text-danger">'.$batch_iderror.'</span>' ?>
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