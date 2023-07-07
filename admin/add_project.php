<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';
include_once __DIR__.'/../controller/projectController.php';

$batch_con=new batchController();
$batches=$batch_con->getBatchInfoTraineeCourses();

$project_con=new ProjectController();

if(isset($_POST['submit'])){
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
    $status=$project_con->addProjects($title,$start_date,$rate,$batch_id);
    if($status){
        echo '<script>location.href="project.php?status='.$status.'"</script>';

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
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php if(isset($title)) echo $title; ?>">
                                    <?php if(isset($error) && isset($titleerror)) echo '<span class="text-danger">'.$titleerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php if(isset($start_date)) echo $start_date; ?>">
                                    <?php if(isset($error) && isset($dateerror)) echo '<span class="text-danger">'.$dateerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Rate</label>
                                    <input type="text" name="rate" class="form-control" value="<?php if(isset($rate)) echo $rate; ?>">
                                    <?php if(isset($error) && isset($rateerror)) echo '<span class="text-danger">'.$rateerror.'</span>' ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="batch_id" id="" class="form-select">
                                    <option value="" disabled selected>--Select Project--</option>
                                        <?php
                                        foreach($batches as $batch){
                                        ?>
                                        <option value="<?php echo $batch['id'] ?>"
                                        <?php
                                        if(isset($batch_id) == $batch['id'])
                                        echo 'selected';
                                        ?>
                                        ><?php echo $batch['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php if(isset($error) && isset($batch_iderror)) echo $batch_iderror; ?></span>
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