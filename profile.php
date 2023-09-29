<?php
session_start();

$pagetitle = 'profile';
include 'init.php';

$sessionUser = $_SESSION['user'];
if (isset($_SESSION['user'])) {
  $getUser = $con->prepare("SELECT * FROM users WHERE Username = ?");
  $getUser->execute(array($sessionUser));

  $info = $getUser->fetch();

?>
<h1 class="text-center">My profile</h1>
<div class="info block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">info</div>
			<div class="panel-body">
		
             <ul class="list-unstyled">
				     <li>
				     	<i class="fa fa-unlock-alt fa-fw"></i>
				     	<span>Name :</span><?php echo $info['Username'] ?></li>
					  <li>
					  	<i class="fa fa-users fa-fw"></i>
					  	<span> FullName :</span><?php echo $info['FullName'] ?>
					  </li>
						<li>
							<i class="fa fa-envelop-o fa-fw"></i>
							<span> Email :</span><?php echo $info['Email'] ?></li>
								
             </ul>
			</div>
		</div>
	</div>
</div>

<div class="my-ads block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">ads</div>
			<div class="panel-body"> 	 
							
						    <?php
						    if (! empty(getitems('Member_ID',$info['UserID']))) {
						 echo '<div class= "row">';
						    foreach(getitems('Member_ID',$info['UserID']) as $item){
						        echo '<div class="col-sm-6 col-md-3">';
						            echo '<div class="thumbnail item-box ">';
						                echo '<span class="item-box.price-tag">' .$item['Price'] . '</span>';
						      echo '<img class="product-images " src=lap.jpg  alt=""/>';
						                   echo '<div class="caption">';
						                   echo '<h3>'.$item['Name'].'</h3>';
						                   echo '<p>'.$item['Description'].'</p>';
						echo'</div>';
						echo '</div>';
						echo '</div>';
						}
						echo'</div>';
}else{
	echo' sorry no ads to show';
}


						    ?>
						    </div>
			</div>
		</div>
	</div>
</div>

<div class="my-comments block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">comments</div>
			<div class="panel-body">
			 
<?php
$stmt = $con->prepare("SELECT comment FROM comments WHERE user_id=?");
$stmt->execute(array($info['UserID']));
$comments = $stmt->fetchAll();

if (! empty($comments)) {
  foreach($comments as $comment){
    echo '<p>'  . $comment['comment'] .'</p>';
  }
}else{
  echo 'there is no comments to show';
}  
?>

			</div>
		</div>
	</div>
</div>
<?php
}else{
	header('location:login.php');
	exit();

}
include  $tpl. 'footer.php';
?>