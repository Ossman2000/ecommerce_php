<?php
//manage members page
//add/edit/delete members
session_start();
$pagetitle = 'Comments';
if (isset($_SESSION['Username'])) {

	include 'init.php';

$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

//start manage page

if ($do =='Manage'){ 
	$stmt = $con->prepare("SELECT 
		comments.*,items.Name AS Item_Name , users.Username AS member 
		FROM comments 
		INNER JOIN 
		items ON  items.Item_ID = comments.item_id
		INNER JOIN users ON users.UserID = comments.user_id ");
	$stmt->execute();
	$rows = $stmt->fetchAll();

	?>

<h1 class="text-center">Manage Comments </h1>
<br>
<div class="container">
		<br>
		<br>

	<div class="table-responsive" >
		<table class="table text-center">
			<tr>
				<td>#ID</td>
				<td>Comment</td>
				<td>Added date</td>
				<td>Item name</td>
				<td>User Name</td>
				<td>Control</td>
				<td>Approve</td>
			</tr>
			<?php


			foreach($rows as $row){

				echo" <tr style='color: black;' >";
				echo" <td>" .$row['c_id'] ."</td>";

				echo" <td>" .$row['comment'] ."</td>";

				echo" <td>".$row['comment_date'] ."</td>";
				
				echo" <td>" .$row['Item_Name'] ."</td>";
				
				echo" <td>" .$row['member'] ."</td>";
			
				echo" <td> " ;

				echo "<a href='comments.php?do=Delete&comid=". $row['c_id']."' class='btn btn-danger confirm'>Delete</a> </td>";
				
				echo "</td>";
			
				echo "<td>";

				if ($row['status'] == 0) {
					echo "<a href='comments.php?do=Activate&comid=". $row['c_id']."' class='btn btn-primary'>Activate</a> </td>";
				}
				elseif($row['status'] == 1){

					echo "APPROVED";
				}

				echo "</td>";

				echo "</tr>";
			}	

			?>
		</table>
		
	</div>
</div>



<?php 
	}elseif($do == 'Delete'){

	$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
	
	$check = checkItem('c_id' , 'comments' ,$comid );

	if ($check > 0) {

		$stmt = $con->prepare("DELETE FROM comments WHERE c_id = :zid");
		
		$stmt->bindParam(":zid" , $comid);
		
		$stmt->execute();
		
		echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record deleted</div>'; 

	} else {

		echo"null";
	}


	} elseif ($do == 'Activate') {


		$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

		$check = checkItem('c_id' , 'comments' , $comid);
		if ($check > 0) {

		

		$stmt = $con->prepare("UPDATE comments SET status = 1 WHERE c_id = ?");
		
		$stmt->execute(array($comid));
		$count = $stmt->rowCount();

		echo  "<div class='alert alert-success'>".' Record Activate</div>'; 
}

	include 'INCLUDES/templates/footer.php';
	


}else {
header('Location: index.php');
	exit();
}
}
