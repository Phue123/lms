<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';
include_once __DIR__.'/../controller/projectController.php';

$batch_con=new batchController();
$batches=$batch_con->getBatchInfoTraineeCourses();

$project_con=new ProjectController();

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $start_date=$_POST['start_date'];
    $rate=$_POST['rate'];
    $batch_id=$_POST['batch_id'];
    $status=$project_con->addProjects($title,$start_date,$rate,$batch_id);
    if($status){
        echo '<script>location.href="project.php?status='.$status.'"</script>';

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
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Rate</label>
                                    <input type="text" name="rate" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="batch_id" id="" class="form-select">
                                        <?php
                                        foreach($batches as $batch){
                                            echo "<option value=".$batch['id'].">". $batch['name']."</option>";
                                        }
                                        ?>
                                    </select>
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