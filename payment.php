<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MASSAGE MANAGEMENT SYSTEM   </title>
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
        <h1> Massage Management System</h1>
        <div class="stylecontact">
                <div class="contact-page" style="color: white; height: 40vh;">
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useraccounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    if ($_FILES["img"]["error"] === 4) {
        echo "<script>alert('Image does not exist')</script>";
    } else {
        $fileName = $_FILES["img"]["name"];
        $fileSize = $_FILES["img"]["size"];
        $tmpName = $_FILES["img"]["tmp_name"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Invalid Image Extension')</script>";
        } elseif ($fileSize > 100000) {
            echo "<script>alert('Image Size is too large')</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $targetDirectory = 'uploads/';
            $targetPath = $targetDirectory . $newImageName;

            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            if (move_uploaded_file($tmpName, $targetPath)) {
                $sql = "INSERT INTO receipt (img) VALUES ('$targetPath')";

                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Successfully Added')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            }
        }
    }
}

$conn->close();
?>
                    <form action="payment.php" method="post" enctype="multipart/form-data">
                        <label for="img">Select File</label>
                        <input type="file" id="img" name="img" accept="image/*"> <br>
                        <button type="submit" name="submit" style="margin-top:20px; background-color:turquoise;">Submit Receipt</button>
                    </form>
                </div>
            </div>
    </div>

<script src="scripts.js"></script>
</body>
</html>