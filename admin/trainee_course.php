<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/trainee_courseController.php';

$train_con=new train_cosController();
$trainees=$train_con->getTrainCourseInfo();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Registration Form</strong></h1>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_trainee_course.php" class="btn btn-dark">Add New Trainee_Course</a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Batch Name</th>
                                        <th>Trainee Name</th>
                                        <th>Joined Date</th>
                                        <th>Status</th>
                                        <th>Email Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($trainees as $trainee){
                                        echo "<tr>";
                                        echo "<td>". $count++ .".</td>";
                                        echo "<td>" . $trainee['bname']. "</td>";
                                        echo "<td>" . $trainee['tname']. "</td>";
                                        echo "<td>" . $trainee['joined_date']. "</td>";
                                        echo "<td>" . $trainee['status']. "</td>";
                                        if($trainee['email_status']==1){
                                            echo "<td class='text-info'>Already Uploaded</td>";
                                        }else{
                                            echo "<td id=".$trainee['id']."><a class='btn btn-info mx-3 send' href='email_trainee_course.php?id=".$trainee['id']."'>Send</a></div></td>";

                                        }
                                        echo "<td id='".$trainee['id']."'><a class='btn btn-warning mx-3' href='edit_trainee_course.php?id=".$trainee['id']."'>Edit</a><button class='btn btn-danger tsbtn_delete'>Delete</button></td>";
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