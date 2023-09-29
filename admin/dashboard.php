
<?php
session_start();
if (isset($_SESSION['Username'])) {
	$pagetitle = 'dashboard'; 
	include 'init.php';?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="color: black; font-size-adjust: 60px;" class="container text-center home-stats">
		<h1>Dashborad</h1>
		<br>
		<br>
		<div class="row">
			<!--<div class="col-md-3">
				<div class="stat">Admins<span style="  display: block;
  font-size: 50px;"><?php  echo countItems('UserID', 'users')?></span></div>
			</div> -->
			<div class="col-md-3">
				<div class="stat">Users<span style="  display: block;
  font-size: 50px;"><?php echo countItems('UserID', 'users') ?></span></div>
			</div>
			<div class="col-md-3">
				<div class="stat">Pending Users<a href="members.php"><span style="  display: block;
  font-size: 50px;"> <?php echo checkItem("RegStatus","users", 0) ?> </span></a></div>
			</div>
			<div class="col-md-3">
				<div class="stat">Products <a href="items.php"> <span style="  display: block;
  font-size: 50px;"><?php  echo countItems('Item_ID', 'items')?></span></a></div>
			</div>
			<div class="col-md-3">
				<div class="stat">Pending Products<a href="items.php"><span style="  display: block;
  font-size: 50px;"><?php echo checkItem("Approve","items", 0) ?></span></a></div>
			</div>
		</div>
	</div>
	<div class="container latest">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users"></i> Admins
					</div>
					<div style="color: black;" class="panel-body BLK ">
<?php
$theLatest = getLatest("*" , "users" , "UserID" , 6);
foreach ($theLatest as $user ) {
	echo $user['Username'] . '<br>';
}
?>
					</div>
				</div>
			</div>
			
<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users"></i> latest Added products
					</div>
					<div class="panel-body">
						
						<?php
$theLatest = getLatest("*" , "items" , "Name" , 6);
foreach ($theLatest as $item ) {
	echo $item['Name'] . '<br>';
}
?>

					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-comments-o"></i> latest Comments
					</div>
					<div style="color: black;" class="panel-body BLK ">
<?php
					$stmt = $con->prepare("SELECT 
							comments.*,users.Username AS Member 
							FROM comments 
							INNER JOIN 
							users
							 ON
							  users.UserID = comments.user_id ");

						$stmt->execute();
						
						$comments = $stmt->fetchAll();

						foreach($comments as $comment){

							echo'<div class = "comment-box"> ';

							echo "<div style='color: black; font-size: x-large; font-weight: bold;'>" . $comment['Member'] ."</div>" ;
							echo "<div style='color: darkred; font-size: medium;'>" . $comment['comment'] ."</div>" ;


							

							echo '</div>';
						}


?>
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>


	 <?php
	 include $tpl . 'nb2.php';
	include $tpl .'footer.php';

} else {
header('Location: index.php');
	exit();} 
	include $tpl . 'nb2.php';