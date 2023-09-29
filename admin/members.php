<?php
//manage members page
//add/edit/delete members
session_start();
$pagetitle = 'Members';
if (isset($_SESSION['Username'])) {
	include 'init.php';

$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
//start manage page
if ($do =='Manage'){ 
	$stmt = $con->prepare("SELECT * FROM users WHERE GroupID!= 1");
	$stmt->execute();
	$rows = $stmt->fetchAll();

	?>

<h1 class="text-center">Manage members</h1>
<br>
<div class="container">
		<a href="members.php?do=Add&userid=<?php echo $_SESSION['ID']?>" class="btn btn-primary "> Add Members </a>
		<br>
		<br>

	<div class="table-responsive" >
		<table class="table text-center">
			<tr>
				<td>#ID</td>
				<td>Username</td>
				<td>Email</td>
				<td>FullName</td>
				<td>Activation status</td>
				<td>Control</td>
			</tr>
			<?php


			foreach($rows as $row){

				echo" <tr style='color: black;' >";
				echo" <td>" .$row['UserID'] ."</td>";
				echo" <td>" .$row['Username'] ."</td>";
				echo" <td>" .$row['Email'] ."</td>";
				echo" <td>" .$row['FullName'] ."</td>";
				echo" <td>";
				if ($row['RegStatus'] == 0 ) {
				echo "<a href='members.php?do=Activate&userid=". $row['UserID'].   "' class='btn btn-primary' >Activate</a> ";
				}elseif($row['RegStatus'] == 1){

					echo "APPROVED";
				}
				echo"</td>";

				echo" <td> " ;
				echo "<a href='members.php?do=Edit&userid=". $row['UserID'].   "' class='btn btn-success' >Edit</a> ";

				echo "<a href='members.php?do=Delete&userid=". $row['UserID']."' class='btn btn-danger confirm'>Delete</a> </td>";
				
				echo "</td>";

				echo "</tr>";
			}	

			?>
		</table>
		
	</div>
</div>



<?php 
}
elseif($do == 'Add'){?>

<h1 class="text-center">Add new Admins </h1>
<!--start of user name-->
<div  class="container"> 
<form class="form-horizontal" action="?do=Insert " method="POST" >
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Username </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="Username" class="form-control" value="" autocomplete="off" required = "required" placeholder="" />
		</div>
	</div>

<!--end of user name-->
<!--start of Password-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Password </label>
		<div class="col-sm-10 col-md-4">
			<input type="password" name="password" class="form-control" autocomplete="new-password" required= "required" placeholder="" />

		</div>
	</div>

<!--end of Password-->
<!--start of Email-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Email </label>
		<div class="col-sm-10 col-md-4">
			<input type="email" name="email" value="" class="form-control" required = "required"/>
		</div>
	</div>

<!--end of Email-->
<!--start of Full name-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Full name </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="full" value="" class="form-control" required = "required" placeholder="" />
		</div>
	</div>
<!--end of Full name-->
<!--start of save-->
	<div class="form-group form-group-lg">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value ="Add member" class="btn btn-primary btn-lg"/>
		</div>
	</div>
</form>
</div>
<?php  } 
elseif($do == 'Insert')
        {
	echo"<h1 class='text-center'>Update members </h1>";
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

			
			$user = $_POST['Username'];
			$pass = $_POST['password'];
			$email = $_POST['email'];
			$name = $_POST['full'];
			
			$hashedPass = sha1($_POST['password']);

			//pass trick
			

			$formErrors = array();
			if (empty($user)) {

			$formErrors[] = '<div class="alert alert-danger">  user name cant be <strong> empty</strong></div>'; 
			
			}
			if (empty($pass)) {

			$formErrors[] = '<div class="alert alert-danger">  password cant be <strong> empty</strong></div>'; 
			
			}
			if (empty($name)) {

			$formErrors[] = '<div class="alert alert-danger"> name cant be empty</div>'; 

			}
			if (empty($email)) {

			$formErrors[] = '<div class="alert alert-danger"> email cant be empty</div>'; 
			}
			foreach ($formErrors as $error) {
				echo $error . '<br/>';

				// code...
			}
			if (empty($formErrors)){


			
		// insert user info to DB
				//err

				$stmt = $con-> prepare("INSERT INTO users(Username , Password , Email , FullName, RegStatus) VALUES (:zuser, :zpass , :zmail, :zname, 1)");
				$stmt->execute(array('zuser' => $user, 'zpass' => $hashedPass , 'zmail' => $email, 'zname' => $name));



			echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record Inserted</div>'; 
	} 
} else {
		echo 'get lost';
	}

 



}elseif ($do == 'Edit') { //edit page
	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
	echo $userid;

	$stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
$stmt->execute(array($userid));
$row = $stmt -> fetch();
$count = $stmt->rowCount();
	if ($stmt -> rowCount() > 0) {


	
?>
<h1 class="text-center">Edit page </h1>
<!--start of user name-->
<div  class="container"> 
<form class="form-horizontal" action="?do=Update " method="POST" >
	<input type="hidden" name="userid" value="<?php echo $userid ?>"/>
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Username </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="Username" class="form-control" value="<?php echo$row['Username']?>" autocomplete="off" required = "required" />
		</div>
	</div>

<!--end of user name-->
<!--start of Password-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Password </label>
		<div class="col-sm-10 col-md-4">
			<input type="hidden" name="oldpassword" value="<?php echo$row['Password']?>" />
			<input type="password" name="newpassword" class="form-control" autocomplete="new-password" />

		</div>
	</div>

<!--end of Password-->
<!--start of Email-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Email </label>
		<div class="col-sm-10 col-md-4">
			<input type="email" name="email" value="<?php echo$row['Email']?> " class="form-control" required = "required"/>
		</div>
	</div>

<!--end of Email-->
<!--start of Full name-->
	<div class="form-group form-group-lg">
		<label style="color: black;" class="col-sm-2 control-label" > Full name </label>
		<div class="col-sm-10 col-md-4">
			<input type="text" name="full" value="<?php echo$row['FullName']?>" class="form-control" required = "required"/>
		</div>
	</div>
<!--end of Full name-->
<!--start of save-->
	<div class="form-group form-group-lg">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value ="save" class="btn btn-primary btn-lg"/>
		</div>
	</div>
</form>
</div>
<!--end of save-->
<?php
} else {
	echo 'there is no id ';
}
} elseif ($do == 'Update') { 
	echo"<h1 class='text-center'>Update members </h1>";
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

			$id = $_POST['userid'];
			$user = $_POST['Username'];
			$email = $_POST['email'];
			$name = $_POST['full'];
			//pass trick
			$pass = '';
			if (empty($_POST['newpassword'])) {
				$pass = $_POST['oldpassword'];
			} else {

				$pass = sha1($_POST['newpassword']);
			}

			$formErrors = array();
			if (empty($user)) {

			$formErrors[] = '<div class="alert alert-danger">  user name cant be <strong> empty</strong></div>'; 
			
			}
			if (empty($name)) {

			$formErrors[] = '<div class="alert alert-danger"> name cant be empty</div>'; 

			}
			if (empty($email)) {

			$formErrors[] = '<div class="alert alert-danger"> email cant be empty</div>'; 
			}
			foreach ($formErrors as $error) {
				echo $error . '<br/>';

				// code...
			}
			if (empty($formErrors)){


			
		// update db with this info
			$stmt = $con-> prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
			$stmt -> execute(array($user, $email, $name, $pass , $id));

			echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record updated</div>'; 
	} else {
		echo 'get lost';
	}
} }
	elseif($do == 'Delete'){

	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
	echo $userid;

	$stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
$stmt->execute(array($userid));
$row = $stmt -> fetch();
$count = $stmt->rowCount();
	if ($stmt -> rowCount() > 0) {

		$stmt = $con->prepare("DELETE FROM users WHERE UserID = :zuser");
		$stmt->bindParam(":zuser" , $userid);
		$stmt->execute();
					echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record deleted</div>'; 

	}


	} elseif ($do == 'Activate') {


		$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

		$check = checkItem('userid' , 'users' , $userid);
		if ($check > 0) {

		

		$stmt = $con->prepare("UPDATE users SET RegStatus = 1 WHERE UserID = ?");
		
		$stmt->execute(array($userid));$stmt->execute(array($userid));
		$count = $stmt->rowCount();

						echo  "<div class='alert alert-success'>".' Record Activate</div>'; 
}

	include 'INCLUDES/templates/footer.php';
	


}else {
header('Location: index.php');
	exit();
}
}
