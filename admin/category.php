<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';

$cat_controller=new Categorycontroller();
$categories=$cat_controller->getCategorysAdmin();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Category</strong> Dashboard</h1>
                    <?php
                    if(isset($_GET['status']) && $_GET['status']==1){
                        echo "<div class='text-success'>New category has been successfully created.</div>";
                    }else if(isset($_GET['status']) && $_GET['status']==2)
					{
						echo "<div class='text-success'>New category has been successfully updated.</div>";
					}
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_category.php" class="btn btn-dark">Add New Category</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($categories as $category){
                                        echo "<tr>";
                                        echo "<td>". $count++ .".</td>";
                                        echo "<td>" . $category['name']. "</td>";
                                        echo "<td id='".$category['id']."'> <a class='btn btn-warning mx-3' href='edit_category.php?id=".$category['id']."'>Edit</a> <button class='btn btn-danger btn_delete'>Delete</button></div>" ;
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