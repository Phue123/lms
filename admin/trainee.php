<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$train_controller=new traineeController();
$trainees=$train_controller->getTraineeAdmin();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Trainee</strong> Dashboard</h1>
                    <?php
                    if(isset($_GET['result']) && $_GET['result']==1){
                        echo "<div class='text-success'>New trainee has been successfully created</div>";
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <a href="add_trainee.php" class="btn btn-dark">Add More Students</a>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="table">
                                <thead>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Emial</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Education</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($trainees as $trainee)
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $count++ . "</td>";
                                        echo "<td>" . $trainee['name'] . "</td>";
                                        echo "<td>" . $trainee['email'] . "</td>";
                                        echo "<td>" . $trainee['phone'] . "</td>";
                                        echo "<td>" . $trainee['city'] . "</td>";
                                        echo "<td>" . $trainee['education'] . "</td>";
                                        echo "<td>" . $trainee['remark'] . "</td>";
                                        echo "<td>" . $trainee['status'] . "</td>";
                                        echo "<td id='".$trainee['id']."'><a class='btn btn-warning mx-3' href='edit_trainee.php?id=".$trainee['id']."'>Edit</a><button class='btn btn-danger trainbtn_delete'>Delete</button></td>";
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