<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';

$project_con=new ProjectController();
$projects=$project_con->getProjectes();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Project</strong> Dashboard</h1>
                    <?php
                    if(isset($_GET['status']) && $_GET['status']==1){
                        echo "<div class='text-success'>New Project has been successfully created.</div>";
                    }
                    ?>

					<div class="row mt-3">
						<div class="col-md-3">
							<a href="add_project.php" class="btn btn-dark">Add More Project</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="table">
								<thead>
									<th>No.</th>
									<th>Title</th>
									<th>Start Date</th>
									<th>Rate</th>
									<th>Batch Name</th>
									<th>Actions</th>
								</thead>
								<tbody>
									<?php
									$count=1;
									foreach($projects as $project){
										echo "<tr>";
										echo "<td>". $count++ ."</td>";
										echo "<td>". $project['title'] ."</td>";
										echo "<td>". $project['start_date'] ."</td>";
										echo "<td>". $project['rate'] ."</td>";
										echo "<td id='".$project['id']."'> <a class='btn btn-warning mx-3' href='add_ojt.php?id=".$project['id']."'>Trainee</a></div>" ;
										echo "<td id='".$project['id']."'> <a class='btn btn-warning mx-3' href='edit_project.php?id=".$project['id']."'>Edit</a> <button class='btn btn-danger pjbtn_delete'>Delete</button></div>" ;
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