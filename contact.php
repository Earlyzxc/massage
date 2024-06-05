
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="main.css">
</head>
<body class="contact-body">
    <div class="topnav">
    <a href="logout.php">Logout</a>
        <a class="active" href="Main.php">Home</a>
      </div>
    <div class="menu">
        <div class="sidebar" id="sidebar">
            <div class="profile">

                <img src="/image/download.jpg" alt="profile_picture">
                <h3><?php echo $_SESSION["full_name"]; ?></h3>
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
            <div class="stylecontact">
                <div class="contact-page" style="color: white;">
                    <h1>CONTACT INFORMATION</h1>
                    <p>Mobile No.: 09123456789</p>
                    <P>Telephone No.: (01) 2345678</P>
                    <p>Email: Valleyhighacademy@gmail.com</p>
                </div>
            </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>