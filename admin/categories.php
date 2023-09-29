<?php
session_start();
$pagetitle = '';
if (isset($_SESSION['Username'])) {
	
	include 'init.php';

	
	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
	
	if ($do == 'Manage') {
	 ?>

<?php
$stmt2 = $con->prepare("SELECT * FROM categories ORDER BY Ordering ASC 	");
	$stmt2->execute();
	$cats = $stmt2->fetchAll();
		?>
	<h1 class="text-center">Manage Categories</h1>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				Manage Categories
			</div>
			<div class="panel-body">
				<?php foreach ($cats as $cat) {
					echo "<h3>".$cat['Name'] . '<br />' . "</h3";				} ?>
			</div>
		</div>

	</div>
	<a href="categories.php?do=Add" class="btn btn-primary "> Add Categories </a>

	 <?php
	} elseif( $do == 'Add'){ ?>

		<h1 class="text-center">Add new Categories </h1>
<!--start of  name-->
<div  class="container"> 
<form class="form-horizontal" action="?do=Insert " method="POST" >
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Name </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="name" class="form-control" value="" autocomplete="off" required = "required" placeholder="Name of category" />
		</div>
	</div>

<!--end of  name-->
<!--start of Description-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Description </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="description" class="form-control" autocomplete="new-password" placeholder="Describe the category" />

		</div>
	</div>

<!--end of Description-->
<!--start of order-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Ordering </label>
		<div class="col-sm-10 col-md-4">
			<input type="Text" name="ordering" value="" class="form-control" placeholder="Number to arrange the categories" />
		</div>
	</div>

<!--end of order-->
<!--start of visible-->
	
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Visible </label>
		<div class="col-sm-10 col-md-4">
			<div>
				<input id ="vis-yes"type="radio" name="visibility" value="0" checked/>
				<label for="vos-yes">yes</label>
			</div>
			<div>
				<input id="vis-no" type="radio" name="visibility" value="1" />
				<label for="vis-no">no</label>
			</div>
		</div>
			</div>

	<!--end of visible -->

	<!--start of Allow comments -->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Allow comments </label>
		<div class="col-sm-10 col-md-4">
			<div>
				<input id ="com-yes"type="radio" name="Commenting" value="0" checked/>
				<label for="com-yes">yes</label>
			</div>
			<div>
				<input id="com-no" type="radio" name="Commenting" value="1" />
				<label for="com-no">no</label>
			</div>
		</div>
				</div>



	<!--End of Allow comments -->

	<!--start of Allow Ads -->

<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Allow Ads </label>
		<div class="col-sm-10 col-md-4">
			<div>
				<input id ="ads-yes"type="radio" name="ads" value="0" checked/>
				<label for="ads-yes">yes</label>
			</div>
			<div>
				<input id="ads-no" type="radio" name="ads" value="1" />
				<label for="ads-no">no</label>
			</div>
		</div>
				</div>

	<!--End of Allow Ads -->
<!--start of add -->
	<div class="form-group form-group-lg">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value ="Add Category" class="btn btn-primary btn-lg"/>
		</div>
	</div>
</form>
</div> ?>
<?php
	}
elseif( $do == 'Insert'){
?>

<h1 class='text-center'>Insert Category </h1><?php

		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

			
			$name = $_POST['name'];
			$desc = $_POST['description'];
			$order = $_POST['ordering'];
			$visible = $_POST['visibility'];
			$comment = $_POST['Commenting'];
			$ads = $_POST['ads'];


		// insert user info to DB
				//err
			$check = checkItem("Name","categories",$name);

				if ($check == 1){

					echo "this user exists";
				} else {
			}

				$stmt = $con-> prepare("INSERT INTO categories(Name , Description , Ordering , Visibility, Allow_comment, Allow_Ads) VALUES (:zname, :zdesc , :zorder, :zvisible, :zcomment , :zads)");
				$stmt->execute(array('zname' => $name, 'zdesc' => $desc , 'zorder' => $order, 'zvisible' => $visible , 'zcomment' => $comment , 'zads' => $ads));



			echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record Inserted</div>'; 
}  }
} else {

	header('Location: index.php');
	exit();
} 
	?>