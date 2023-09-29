<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
      <title>Dashborad</title>
     <link rel = "stylesheet" href="./LAYOUT/CSS/bootstrap.min.css"/>
<link rel = "stylesheet" href="./LAYOUT/CSS/font-awesome.min.css"/>
      <link rel="stylesheet" href="./INCLUDES\templates\style.css">
<link rel="stylesheet" href="./LAYOUT/CSS/front.css">
<link rel="stylesheet" href="./LAYOUT/CSS/jquery-ui.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
	<body>
		<div class="upper-bar">
			<div class="container"><?php

			if (isset($_SESSION['user'])){

				echo 'welcome'.$_SESSION['user'] . ' ';

				echo '<a href="profile.php">My profile</a>';

				echo ' -<a href="logout.php">log out</a>';
            echo ' -<a href="newad.php">newAD   </a>';

			    CheckUserStatus($_SESSION['user']);

			    if(CheckUserStatus($_SESSION['user'])==1){
			    	echo 'Your MemberShip Need to be activeted with the admin';
			    }
			}	else{

			?>
			<a href="login.php">
				<span class="pull-right">login/signup</span>
			</a>
		<?php } ?>
	         </div>
		</div>
      <nav>
         <div class="logo">
            Badelha<span style="font-size: medium;">PMS</span>
            
         </div>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="navbar-right"></i>
         </label>
         <ul>
                    <li class="nav-link"><a href="index.php">Home Page</a></li>
                    <li class="nav-link"><a href="logout.php"><span>LOGOUT</span></a></li>
                    <div class="navbar-right">
                    <?php
                    foreach(getcat()as $cat){
                    	
                 echo '<li><a href="categories.php?Pageid='.$cat['ID'].'&Pagename='.str_replace(' ' ,'-',$cat['Name']).'">'.$cat['Name'].'</a></li>';
                    }
                     ?>

                </ul>
   
      </nav>





