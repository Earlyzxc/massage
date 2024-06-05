<?php
 session_start();
if (isset($_SESSION["user"])) {
    echo"<script> window.location.href='Main.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Spa Home Mangement</title>
    <style>
        .btn:hover{
            background-color: #0056b3;
        }
        .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background: rgba(0, 0, 0, 0.9);
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: fadeIn 0.5s;
    color: #fff;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover, .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.privacy-policy-link {
    text-align: center;
    margin-top: 10px;
}

.privacy-policy-link p {
    display: inline-block; 
}
    </style>
</head>
<body>
    <div class="header">
    <img src="/image/LOGO.png" alt="">
    <header>
        <h1>MASSAGE MANAGEMENT SYSTEM</h1>
        <p>Valley High Academy, J.P Rizal St. Manggahan, Rodriguez, Rizal</p>
    </header>
    </div>
    <div class="experiment">
        <div class="section">
            <section>
            <h2>About Us</h2>
<p>Welcome to Massage Management System! We are a group of passionate and dedicated students from Valley High Academy, united by our shared enthusiasm for innovation and technology. Our current project involves developing a cutting-edge system aimed at enhancing everyday experiences and solving real-world problems.</p>

<h2>Our Mission</h2>
<p>At Valley High Academy, we believe in the power of education and creativity. Our mission is to leverage our diverse skills and knowledge to create impactful technological solutions. We are committed to pushing the boundaries of what is possible and bringing fresh, innovative ideas to life.</p>

<h2>Our Team</h2>
<p>Our team is composed of talented students from various academic disciplines, each bringing unique perspectives and expertise to the table. Guided by our mentors and supported by the academy's resources, we collaborate closely to design, develop, and implement systems that make a difference.</p>

<h2>Our Project</h2>
<p>We are currently working on an exciting project that we believe will have a significant impact. While we cannot reveal all the details just yet, we can share that our system is designed to be user-friendly, efficient, and highly adaptable. Stay tuned for more updates as we progress through the stages of development!</p>

<h2>Join Us</h2>
<p>We invite you to follow our journey as we navigate the challenges and triumphs of developing innovative technology. Your support and feedback are invaluable to us. Together, we can achieve great things and inspire others to explore the fascinating world of tech innovation.

Thank you for visiting our page. We look forward to sharing our progress with you! </p>
                <div class="proj">
                    <h2>PROJECT DEVELOPERS</h2>
                    <div class="devz">
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 1</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 1</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 2</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 3</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 4</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 5</h2>
                        </div>
                        <div class="devs">
                        <img src="/image/download.jpg" alt="">
                        <h2>PROJECT 6</h2>
                        </div>
                    </div>
                </div>
             </section>
        </div>
    
         <div class="Loginz">
         <?php
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "database.php"; 
                
                
                $sql = "SELECT id, full_name, email, address, phone, password FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                
               
                if ($result->num_rows == 1) {
                    $row = mysqli_fetch_assoc($result);
                    
                    if (password_verify($password, $row["password"])) {
                        $_SESSION["user"] = "yes";
                        $_SESSION["full_name"] = $row["full_name"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["address"] = $row["address"];
                        $_SESSION["phone"] = $row["phone"];
            
                       
                        echo "<script>window.location.href='Main.php'</script>";
                        die(); 
                    }else{
                        echo "<div class='drroarr'>Password does not Match.</div></script>";
                    }
                }else{
                    echo "<div class='drroarr'>Email does not exist</div></script>";
                }

            }
            ?>


            <form action="LogIn.php" method="post">
                <h1>Login</h1>
            <div class="input-box">
                <input type="email" name="email" id="email"  placeholder="Email" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box">
                <input type="password"  name="password" id="password" placeholder="Password" required>
                <i class='bx bx-show' id="ShowPassword"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" id="show-password-checkbox">Show Password</label>
                <a href="forgot-password.php">Forget Password</a>
            </div>
            <button type="submit" name="login" value="login"  class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="Register.php">Register</a></p>
            </div>
            <div class="privacy-policy-link">
                <p>By logging in, you agree to our <a href="#" id="privacy-policy-link">Privacy Policy</a>.</p>
            </div>
            </form>
            <div id="privacyPolicyModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Privacy Policy</h2>
            <p>
            <strong>1. Introduction</strong><br>
            Welcome to [Your Company Name] ("we," "our," "us"). We are committed to protecting your privacy and ensuring that your personal information is handled in a safe and responsible manner. This Privacy Policy explains how we collect, use, and protect your information when you use our Massage Management System (the "Service").
            <br><br>
            <strong>2. Information We Collect</strong><br>
            We collect the following types of information:
            <ul>
                <li>Personal Information: Name, email address, phone number, address, and payment information.</li>
                <li>Booking Information: Details of your bookings, including appointment dates, times, and service preferences.</li>
                <li>Usage Data: Information about how you interact with our Service, including IP address, browser type, and access times.</li>
            </ul>
            <br>
            <strong>3. How We Collect Information</strong><br>
            We collect information in the following ways:
            <ul>
                <li>Directly from You: When you create an account, make a booking, or contact us for support.</li>
                <li>Automatically: Through the use of cookies and other tracking technologies when you use our Service.</li>
                <li>Third-Party Services: From third-party services that you link with our Service (e.g., payment processors).</li>
            </ul>
            <br>
            <strong>4. How We Use Your Information</strong><br>
            We use the collected information to:
            <ul>
                <li>Provide, operate, and maintain our Service.</li>
                <li>Process and manage bookings.</li>
                <li>Communicate with you about your bookings and our Service.</li>
                <li>Improve and personalize your experience.</li>
                <li>Ensure the security of our Service.</li>
                <li>Comply with legal obligations.</li>
            </ul>
            <br>
            <strong>5. How We Protect Your Information</strong><br>
            We implement a variety of security measures to protect your personal information, including:
            <ul>
                <li>Encryption of sensitive data.</li>
                <li>Regular security assessments.</li>
                <li>Access controls to restrict access to your information.</li>
            </ul>
            <br>
            <strong>6. Sharing Your Information</strong><br>
            We may share your information with:
            <ul>
                <li>Service Providers: Third-party companies that perform services on our behalf (e.g., payment processing, data analysis).</li>
                <li>Legal Obligations: When required by law, regulation, or legal process.</li>
            </ul>
            We do not sell or rent your personal information to third parties for their marketing purposes.
            <br><br>
            <strong>7. Your Data Protection Rights</strong><br>
            Depending on your location, you may have the following rights regarding your personal information:
            <ul>
                <li>Access: The right to request access to your personal information.</li>
                <li>Correction: The right to request correction of inaccurate or incomplete information.</li>
                <li>Deletion: The right to request deletion of your personal information.</li>
                <li>Objection: The right to object to the processing of your personal information.</li>
                <li>Restriction: The right to request restriction of processing your personal information.</li>
                <li>Portability: The right to request the transfer of your personal information to another entity.</li>
            </ul>
            To exercise any of these rights, please contact us at [Your Contact Information].
            <br><br>
            <strong>8. Changes to This Privacy Policy</strong><br>
            We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on our website. You are advised to review this Privacy Policy periodically for any changes.
            <br><br>
            <strong>9. Contact Us</strong><br>
            If you have any questions about this Privacy Policy, please contact us at:
            <br><br>
            [Your Company Name]  
            [Your Address]  
            [Your Email Address]  
            [Your Phone Number]
            </p>
        </div>
    </div>  
        </div>
    </div>

    <script>
        document.getElementById('show-password-checkbox').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        // Get the modal
var modal = document.getElementById("privacyPolicyModal");

// Get the button that opens the modal
var btn = document.getElementById("privacy-policy-link");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
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