<?php 
@ob_start();
session_start();
require("connection.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LogIn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="./signIn.css" />


</head>

<body>
    <!-- Hero Area End -->
    <!--================Blog Area =================-->
    <div class="container register">
        <div class="row">
            <div class="col-md-9 register-right">



                <div class="signInCard">
                    <form id="signInForm" method="POST">
                        <h1>QUIZZEY</h1>
                        <input type="email" placeholder="Enter email Id" name="email" required />
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Enter valid phone number" required>
                        </div>
                        <input type="password" placeholder="Password" name="password" required />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="signin">Sign in</button>

                        </div>
                        <span>Don't have an account ?</span>
                        <a class="sign-up" href="./register.html">Sign Up</a>
                </div>



                <div class="col-md-2"></div>
            </div>
            </form>

        </div>
    </div>

    </div>
    </div>

    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>


    <?php
if(isset($_POST['signin'])){

       
    $query = "SELECT * FROM `user_detail` WHERE `email`='$_POST[email]' AND `password`='$_POST[password]' AND `phone_number`='$_POST[phone_number]'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone_number'] = $_POST['phone_number'];
            $_SESSION['first_name'] = $_POST['first_name'];
            
        }
        
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT); 
        $_SESSION['otp'] = $otp;
        
        $otpMessage = "Your OTP is $otp Info sms"; 
        $mobileNumber = $_POST['phone_number'];

        
        $url = 'http://146.88.24.105:8080/api/mt/SendSMS';
        $params = [
            'user' => 'piyushmore',
            'password' => '12345',
            'number' => '91'.$mobileNumber, 
            'text' => urlencode($otpMessage),
            'senderid' => 'INFMTN',
            'channel' => 'Trans',
            'DCS' => '0',
            'flashsms' => '0'
        ];
        
        $queryString = http_build_query($params);
        $finalURL = $url . '?' . $queryString;
        
        // Send OTP
        $response = file_get_contents($finalURL);
        
        if ($response === false) {
            echo "<script>alert('Failed to send OTP.')</script>";
        } else {
            // Redirect to otp.php with ID and OTP in session
            header("location: otp.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid account')</script>";
    }
    
}

?>

</body>

</html>