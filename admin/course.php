<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';

$cos_controller=new CourseController();
$courses=$cos_controller->getCourseAdmin();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Course</strong> Dashboard</h1>
					<?php
                    if(isset($_GET['status']) && $_GET['status']==1){
                        echo "<div class='text-success'>New category has been successfully created</div>";
                    }
					if(isset($_GET['status']) && $_GET['status']==2){
                        echo "<div class='text-success'>New category has been successfully updated</div>";
                    }
                    ?>
					

					<div class="row mt-3">
						<div class="col-md-3">
							<a href="add_course.php" class="btn btn-dark">Add More Course</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="table">
								<thead>
									<th>No.</th>
									<th>Name</th>
									<th>Course Category</th>
									<th>Outline</th>
									<th>Image</th>
									<th>Actions</th>
								</thead>
								<tbody>
									<?php
									$count=1;
									foreach($courses as $course){
										echo "<tr>";
										echo "<td>". $count++ ."</td>";
										echo "<td>". $course['name'] ."</td>";
										echo "<td>". $course['cat_id'] ."</td>";
										echo "<td>". $course['outline'] ."</td>";
										echo "<td><img src='../uploads/". $course['image'] ."' width='100px' height='100px'></td>";
										echo "<td id='".$course['id']."'> <a class='btn btn-warning mx-3' href='edit_course.php?id=".$course['id']."'>Edit</a> <button class='btn btn-danger coursebtn_delete'>Delete</button></div>" ;
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