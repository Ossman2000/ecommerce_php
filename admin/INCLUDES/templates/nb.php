<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html>
   <head>
      <meta charset="utf-8">
      <title>Dashborad</title>
      <link rel="stylesheet" href="INCLUDES\templates\style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <nav>
         <div class="logo">
            Badelha<span style="font-size: large;">PMS</span>
            
         </div>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
                    <li class="nav-link"><a href="dashboard.php">Home</a></li>
                    <li class="nav-link"><a href="items.php">Items</a></li>
                    <li class="nav-link"><a href="members.php?do=Manage&userid=<?php echo $_SESSION['ID']?>">Members</a></li>
                    <!-- <li class="nav-link"><a href="members.php?do=Edit&userid=<?php echo $_SESSION['ID']?>">EDIT</a></li> -->
                    <!-- <li class="nav-link"><a href="categories.php">Categories</a></li> -->
                    <li class="nav-link"><a href="comments.php">Comments</a></li>
                     <li class="nav-link"><a href="../index.php">Visit Shop</a></li>

                    <li class="nav-link"><a href="logout.php"><span>LOGOUT</span></a></li>
                </ul>
      </nav>
      <div class="content">
         <div>








