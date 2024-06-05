

<?php 
session_start();
include('database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Spa Home Management System</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: rgba(0, 0, 0, 0.9);
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 5px;
            color: #fff;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .input-box {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .register-link {
            margin-top: 10px;
        }
        .input-box input[type="checkbox"] {
            width: 16px;
            height: 16px;
            vertical-align: middle;
        }
    </style>
    </style>
</head>
<body>
    <div class="header1">
        <img src="/image/LOGO.png" alt="">
        <header>
            <h1>MASSAGE MANAGEMENT SYSTEM</h1>
            <p>Valley High Academy, J.P Rizal St. Manggahan, Rodriguez, Rizal</p>
        </header>
        </div>
    <div class="Loginzz">
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["Fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $mobile = $_POST["mobile"];
            $address = $_POST["Address"];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $_SESSION["Fullname"] = $_POST["Fullname"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["mobile"] = $_POST["mobile"];
            $_SESSION["Address"] = $_POST["Address"];
            $errors = array();
            if (empty($fullName) OR empty($email) OR empty($password) OR empty($mobile) OR empty($address)) {
                array_push($errors, "<div class='drroar'>All fields are required. </div>");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "<div class='drroar'>Invalid Email. </div>");
            }
            if (strlen($mobile)>11) {
                array_push($errors, "<div class='drroar'>Mobile Number Must be 11 Character </div>");
            }
            if (strlen($mobile)<11) {
                array_push($errors, "<div class='drroar'>Mobile Number Must be 11 Character </div>");
            }
            if (strlen($password)<5) {
                array_push($errors, "<div class='drroar'>Password must be at least 5 character long</div>");
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors,"<div class='drroar'>Email already registered.</div>");
            }
            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "$error";
                }
            }else{
                
                $sql = "INSERT INTO users (full_name, email, password, phone, address) VALUES ( ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sssis",$fullName, $email ,$passwordHash,$mobile ,$address);
                    mysqli_stmt_execute($stmt);
                 

                     echo "<script>alert('Registered Successfully!');</script>";
                }else{
                    die("<script>alert('Something went wrong.')</script>");
                }
            }
        }
        ?>
        <form action="Register.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
            <input type="text" name="Fullname" id="Fullname"  placeholder="Full Name" required>
        </div>
        <div class="input-box">
            <input type="email" name="email" id="email"  placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password"  name="password" id="password" placeholder="Password" required>
        </div>

        <div class="input-box">
            <input type="tel" name="mobile" id="mobile"  placeholder="Mobile No." required>
        </div>
        <div class="input-box">
            <input type="text" name="Address" id="Address"  placeholder="Address" required>
        </div>
        <div class="input-box">
        <input type="checkbox" id="terms" required> I agree with the <a href="#" id="terms-link">Terms and Conditions</a>
        </div>
        <button type="submit" name="submit" value="login"  class="btn"> <a href="Main.html"></a>Register</button>
        <div class="register-link">
            <p>Already have an account? <a href="LogIn.php">LogIn</a></p>
        </div>
        </form>
        <div id="termsModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Terms and Conditions</h2>
        <p>Welcome to our booking system website. By accessing or using our service, you agree to comply with and be bound by the following terms and conditions:</p>

        <h3>1. Acceptance of Terms</h3>
        <p>By registering an account and using our booking services, you agree to abide by these terms and conditions. If you do not agree with any part of these terms, you must not use our service.</p>

        <h3>2. User Account</h3>
        <p>To use our booking system, you must create an account by providing accurate and complete information. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>

        <h3>3. Booking Services</h3>
        <p>Our platform allows you to book services or products from various providers. We act as an intermediary and are not responsible for the actual provision of the booked services. You agree to comply with the terms and conditions of the service providers.</p>

        <h3>4. Payments and Fees</h3>
        <p>All payments for bookings must be made through our platform using the provided payment methods. Fees and charges for services are as displayed at the time of booking. You agree to pay all applicable fees and charges.</p>

        <h3>5. Cancellations and Refunds</h3>
        <p>Cancellation and refund policies vary depending on the service provider. It is your responsibility to review and understand the cancellation and refund policies before making a booking. We are not responsible for any refunds or disputes between you and the service provider.</p>

        <h3>6. User Conduct</h3>
        <p>You agree to use our booking system only for lawful purposes and in accordance with these terms. You must not use our service to engage in any illegal activities, including but not limited to fraud, harassment, or spamming.</p>

        <h3>7. Limitation of Liability</h3>
        <p>We are not liable for any damages, losses, or expenses arising from your use of our booking system or the services provided by third-party providers. Our liability is limited to the maximum extent permitted by law.</p>

        <h3>8. Modifications to Terms</h3>
        <p>We reserve the right to modify these terms and conditions at any time. Any changes will be effective immediately upon posting on our website. Your continued use of our service after any modifications constitutes your acceptance of the revised terms.</p>

        <h3>9. Contact Information</h3>
        <p>If you have any questions or concerns about these terms and conditions, please contact us at support@example.com.</p>

        <p>Thank you for using our booking system!</p>
            </div>
        </div>
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("termsModal");

    // Get the button that opens the modal
    var btn = document.getElementById("terms-link");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function(event) {
        event.preventDefault();
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>
</html>