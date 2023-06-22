<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';

$batch_controller=new batchController();
$batches=$batch_controller->getBatchLists();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Batch</strong> Dashboard</h1>

                    <?php
                    if(isset($_GET['status']) && $_GET['status']==1){
                        echo "<div class='text-success'>New Batch has been successfully created.</div>";
                    }
                    ?>
            
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_batch.php" class="btn btn-dark">Add Batch Category</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>Duration</th>
                                    <th>Fee</th>
                                    <th>Discount</th>
                                    <th>Course Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($batches as $batch){
                                        echo "<tr>";
                                        echo "<td>" . $count++ ."</td>";
                                        echo "<td>" . $batch['bname'] ."</td>";
                                        echo "<td>" . $batch['start_date'] ."</td>";
                                        echo "<td>" . $batch['duration'] ."</td>";
                                        echo "<td>" . $batch['fee'] ."</td>";
                                        echo "<td>" . $batch['discount'] ."</td>";
                                        echo "<td>" . $batch['course_id'] ."</td>";
                                        echo "<td id='".$batch['id']."'><a class='btn btn-warning mx-2' href='edit_batch.php?id=".$batch['id']."'>Edit</a><button class='btn btn-danger batchbtn_delete'>Delete</button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

				</div>
			</main>

<?php
include_once __DIR__."/../layouts/app_footer.php";
?>