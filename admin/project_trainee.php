<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectTraineeController.php';

$project_con=new projectTraineeController();
$projects=$project_con->getProjectTraineess();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Project trainee</strong> Dashboard</h1>
					<?php 
					if(isset($_GET['status']) && $_GET['status']==4){
						echo "<div class='text-success'>Successfully changed</div>";
					}
					?>

					<div class="row mt-3">
						<div class="col-md-3">
							<a href="add_project_trainee.php" class="btn btn-dark">Add More Project</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="table">
								<thead>
									<th>No.</th>
									<th>Project Name</th>
									<th>Trainee Name</th>
									<th>Status</th>
                                    <th>Actions</th>
								</thead>
								<tbody>
									<?php
									$count=1;
									foreach($projects as $project){
										echo "<tr>";
										echo "<td>". $count++ ."</td>";
										echo "<td>". $project['title'] ."</td>";
										echo "<td>". $project['tname'] ."</td>";
										echo "<td>". $project['status'] ."</td>";
										echo "<td id='".$project['id']."'> <a class='btn btn-warning mx-3' href='add_ojttrainee.php?id=".$project['project_id']."'>Trainee</a><button class='btn btn-danger ptbtn_delete'>Delete</button><a class='btn btn-info mx-3' href='details.php?id=".$project['id']."'>Details</a></div>" ;
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