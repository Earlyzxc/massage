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
    <title>MASSAGE MANAGEMENT SYSTEM</title>
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
        <h1>Massage Management System</h1>
        <div class="Services" id="Services">
            <div class="MASSAGE">
                <p>Swedish Massage</p>
                <img src="/image/swedish.jpg" alt="" class="imagess"> 
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Swedish Massage" data-price="349" id="ADDBTN">Add to Orders</button>
                        <button onclick="openModal('Swedish Massage', 349)" >View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p>Combination Massage</p>
                <img src="/image/Combi.jpg" alt="" class="imagess"> 
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Combination Massage" data-price="369" id="ADDBTN">Add to Orders</button>
                        <button onclick="openModal1('Combination Massage', 369)">View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p>Deep Tissue Massage</p>
                <img src="/image/Deep.jpg" alt="" class="imagess">
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Deep Tissue Massage" data-price="429">Add to Orders</button>
                        <button onclick="openModal2('Deep Tissue Massage', 429)">View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p>Foot Refloxology</p>
                <img src="/image/Foot Reflexology.jpg" alt="" class="imagess">
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Foot Reflexolgy" data-price="389">Add to Orders</button>
                        <button onclick="openModal3('Foot Reflexology', 389)">View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p>Hand Refloxology</p>
                <img src="/image/Hand Reflexology.jpg" alt="" class="imagess">
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Hand Refloxology" data-price="359">Add to Orders</button>
                        <button onclick="openModal4('Hand Refloxology', 359)">View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p>Sports Massage</p>
                <img src="/image/Sports.jpg" alt="" class="imagess">
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Sports Massage" data-price="499">Add to Orders</button>
                        <button onclick="openModal5('Sports Massage', 499)">View Details</button>
                    </div>
                </div>
            </div>
            <div class="MASSAGE">
                <p> Lymphatic Massage</p>
                <img src="/image/Lymphatic.jpg" alt="" class="imagess">
                <div class="book">
                <div class="buttons">
                <button class="add-to-cart" data-name="Lymphatic Massage" data-price="529">Add to Orders</button>
                        <button onclick="openModal6('Lymphatic Massage', 529)">View Details</button>
                </div>
                </div>          
            </div>
            <div class="MASSAGE">
                <p>Kiddie Massage</p>
                <img src="/image/Kiddie.jpg" alt="" class="imagess" >
                <div class="book">
                    <div class="buttons">
                    <button class="add-to-cart" data-name="Kiddie Massage" data-price="199">Add to Orders</button>
                        <button onclick="openModal7('Kiddie Massage', 10)">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div id="details-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <p id="modal-price"></p>
      <img id="modal-image" src="" alt="Product Image">
      <p id="modal-description"></p>
    </div>
  </div>
    <script src="scripts.js"></script>
</body>
</html>