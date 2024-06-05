<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    
    <title>My Orders | Massage Management System</title>
</head>
    <style>
 
    .quantity-btn {
        padding: 5px 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }

    .quantity-btn:hover {
        background-color: #45a049;
    }


    td.quantity-cell {
        text-align: center;
    }
    #checkout-products {
  list-style: none;
  padding: 0;
  margin: 0;
}

#checkout-products li {
  margin-bottom: 5px;
  font-size: 16px;
  color: #333;
}

#checkout-products li:before {
  content: "\2022"; 
  color: #FFA500; 
  display: inline-block;
  width: 1em;
  margin-left: -1em;
}
.btnz {
    justify-content: center;    
    align-items: center;
    display: flex;
}
</style>
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
        <table id="checkout-table">
        <thead>
         <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Hours</th>
            <th>Action</th> 
         </tr>
    </thead>
    <tbody>
       
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><strong>Total:</strong></td>
            <td id="total-price">$0.00</td> 
        </tr>

    </tfoot>
</table>
<div id="checkout-button-container">
    <button id="checkout-button">Book Now!</button>
</div>
    </div>
    <div id="modal1" class="modal1">
    <div class="modal-content1">
        <span class="close1">&times;</span>
        <h2>Receipt</h2>
        <div id="capture">

        <?php
if (isset($_POST["submit"])) {
    $fullName = $_POST["full-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $prefDate = $_POST["preferred-date"];
    $prefTime = $_POST["preferred-time"];

   
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "useraccounts"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO product (full_name, email, phone, address, pref_Date, pref_Time) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fullName, $email, $phone, $address, $prefDate, $prefTime);

    if ($stmt->execute()) {
        
    } else {
        

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

            <form action="MyService.php" method="post" id="screenshotArea">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required><br><br>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea><br><br>

                <label for="preferred-date">Preferred Date:</label>
                <input type="date" id="preferred-date" name="preferred-date"><br><br>

                <label for="preferred-time">Preferred Time:</label>
                <input type="time" id="preferred-time" name="preferred-time"><br><br>

                <h3>Products:</h3>
                <ul id="checkout-products" style="color: #fff;"></ul>
           
                <p>Total Price: <span id="checkout-total-price"></span></p>
                <div class="buttonss">
                    <button type="submit" id="checkoutButton101" name="submit" value="submit" style="background-color: turquoise;">Book Now!</button>
                    <button type="button" id="captureBtn">Print Receipt</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const captureButton = document.getElementById('captureBtn');

    captureButton.addEventListener('click', function(event) {
        event.preventDefault(); 
        captureScreenshot();
    });

    function captureScreenshot() {
        html2canvas(document.querySelector("#capture"), {
            allowTaint: true,
            useCORS: true,
            scale: 1,
            scrollY: 0 
        }).then(canvas => {
            var imgData = canvas.toDataURL("image/png");

            var link = document.createElement('a');
            link.href = imgData;
            link.download = 'screenshot.png'; 
            link.click(); 
        }).catch(error => {
            console.error("Error capturing screenshot:", error);
        });
    }
});




</script>


    <script src="scripts.js"></script>
</body>
</html>