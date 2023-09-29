<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="INCLUDES/templates/style.css">
</head>
<body>
    
    <div class="navbar">
        <div class="container flex-nav">
            <div class="nav-header">
                <h2 style="color: white;">BADELHA <span>..</span></h2>
                <button class="nav-toggle" id="navToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <nav class="nav-links" id="nav-links">
                <ul>
                    <li class="nav-link"><a href="dashboard.php">Home</a></li>
                    <li class="nav-link"><a href="#">Items</a></li>
                    <li class="nav-link"><a href="members.php?do=Manage&userid=<?php echo $_SESSION['ID']?>">manage</a></li>
                    <li class="nav-link"><a href="members.php?do=Edit&userid=<?php echo $_SESSION['ID']?>">EDIT</a></li>
                    <li class="nav-link"><a href="categories.php">Categories</a></li>
                    <li class="nav-link"><a href="logout.php"><span>LOGOUT</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="INCLUDES/templates/app.js"></script>
</body>
</html>
