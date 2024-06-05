<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info | Spa Home Management</title>
</head>
<body>
    <div class="topnav">
    <a href="logout.php">Logout</a>
    <a class="active" href="Main.php">Home</a>
      </div>
    <div class="menu">
        <div class="sidebar" id="sidebar">
            <div class="profile">

                <img src="/image/download.jpg" alt="profile_picture">
                <h3> <?php echo $_SESSION["full_name"];?></h3>
                <p>Client</p>
            </div>
            <ul>
                <li>
                    <a href="personal.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Account Info</span>
                    </a>
                </li>
                <li>
                    <a href="MyService.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Orders</span>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="payment-channel.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Payment Channel</span>
                    </a>
                </li>
                <li>
                    <a href="payment.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Payment</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <div class="container" id="container">
    <button id="Hide-btn"><img src="/image/threeline.png" alt="BUTTON"></button>
        <div class="acc">
    
        <div class="profile-picture1">
    <img src="/image/download.jpg" alt="Profile Picture" id="profile-pic">
    </div>
    <div class="user-details">
    <h1>Name: <?php echo $_SESSION["full_name"];?></h1>
    <p>Email: <?php echo $_SESSION["email"]; ?> </p>
    <p>Mobile No.: <?php echo $_SESSION["phone"];?></p>
    <p>Address:<?php echo $_SESSION["address"];?></p>
    </div>
        
    </div> 


    
</div>


    <script src="scripts.js"></script>
</body>
</html>