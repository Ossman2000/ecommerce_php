 <?php
session_start();
$noNavbar = '';
$pagetitle = 'login';
if (isset($_SESSION['Username'])) {
	header('Location: dashboard.php');
}
include 'init.php';
include $tpl . 'header.php';	
include 'INCLUDES/languages/en.php';
?>


<?php 

    


 if ($_SERVER['REQUEST_METHOD'] =='POST' ) {
 	$username = $_POST['user'];
 	$password = $_POST['pass']; 
 $hashedPass = sha1($password);


$stmt = $con->prepare("SELECT UserID, username, password FROM users WHERE username = ? AND password = ? AND GroupID = 1 LIMIT 1");
$stmt->execute(array($username,$hashedPass));
$row = $stmt -> fetch();
$count = $stmt->rowCount();
if($count > 0){
	$_SESSION['Username'] = $username;//register session name
	$_SESSION['ID'] = $row['UserID'];//register session id
	header('Location: dashboard.php');//redirect to dashboard page

	exit();
}
}


?>
<form class ="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
	<h2 class="text-center zzo" >BADELHA </h2>
	<div class="text-center zzo2 ">admin</div>
	<input class="form-control" type ="text" name="user" placeholder="Username" autocomplete="off" />
	<input class ="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-Password"/>
	<input class="btn btn-primary btn-block " type="submit" value="Login" />
</form>
<?php include $tpl .'footer.php'; ?>