<?php 
@ob_start();
session_start();
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzyy</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .item {
            width: 100%;
            height: 550px;
            max-width: 820px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px 10px rgba(0, 0, 0, .4);
            overflow: hidden;
            grid-template-columns: repeat(2, 1fr);
            display: grid;
            z-index: 1000;
        }

        .contact {
            background: #fff;
        }

        .form {
            background: #303ef7;
        }

        .text {

            padding-left: 20px;
            padding-top: 20px;
            font-size: 35px;
            color: #303ef7;
            font-weight: 600;
        }

        .imga {
            height: 320px;
            width: 320px;
            margin-left: 30px;
        }

        .social {
            display: flex;
            list-style: none;
        }

        ul li {
            padding-left: 15px;
            font-size: 24px;
            margin-top: 10px;
        }

        i {
            background: #303ef7;
            padding: 5px;
            border-radius: 5px;
            transition: .3s;
            color: #fff;
        }

        .social i:hover {
            background: #fff;
            color: #303ef7;
        }

        .send {
            font-weight: 500;
            color: #303ef7;
            padding-left: 20px;
        }

        .tt {
            font-size: 25px;
            position: relative;
            top: 20px;
            left: 20px;
            padding-top: 10px;
        }

        form {
            padding: 0 50px;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .input-box {
            height: 40px;
            width: 70%;
            margin: 30px 0;
            position: relative;
        }

        .in {
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid #fff;
            border-radius: 20px;
            outline: none;
            padding-left: 10px;
            color: #fff;
            font-size: 16px;
        }

        .input-box label {
            position: absolute;
            top: 30%;
            left: 35px;
            padding-left: 10px;
            transform: translate(-50%);
            font-size: 15px;
            font-weight: 500;
            font-size: #fff;
            transition: .3s;

        }

        .input-box .in:focus~label,
        .input-box .in:valid~label {
            top: -15px;
            left: 35px;
            background: #303ef7;
            font-weight: 500;
            font-size: 12px;
            padding: 5px;
        }

        textarea.in {
            resize: none;
            min-height: 150px;
            overflow: auto;
        }

        .btn {
            position: relative;
            top: 100px;
            background: #fff;
            outline: none;
            border: none;
            border-radius: 4px;
            height: 45px;
            width: 30%;
            font-size: 16px;
            color: #303ef7;
            cursor: pointer;
            font-weight: 500;
        }

        .h {
            text-decoration: none;
            float:right;
            color: #fff;
            font-size: medium;
            font-family: Arial, Helvetica, sans-serif;
            background: red;
            border-radius: 5px;
            margin-right: 20px;
            margin-top: 20px;
            align-items: center;
            padding: 15px;
        }
        .h:hover {
            opacity: .7;
        }
        
        #massage{
            padding-top: 10px;
        }

        ::-webkit-scrollbar {
    width: 16px;
    
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    background: #ffffff;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    border-radius: 100px;
    background-image: linear-gradient(#000c8a,#1224e9,#3545f5, #6a77ff);
  }
    </style>
</head>

<body>
<a href="home.php" class="h">X</a>

    <div class="container">
        <div class="item">
            <div class="contact">`
                <div class="text">Let's get in touch</div>
                <img src="https://img.freepik.com/free-vector/flat-design-illustration-customer-support_23-2148887720.jpg?w=740&t=st=1709365249~exp=1709365849~hmac=462e0e43edc63514fda6476e71d68b9444a24901e82f7251992a55138e2cf8e3" alt="" class="imga">
                <div class="links">
                    <span class="send">Contact with us</span>
                    <ul class="social">
                        <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="#"><i class='bx bxl-twitter'></i></i></a></li>
                        <li><a href="#"><i class='bx bxl-youtube'></i></i></a></li>
                        <li><a href="#"><i class='bx bxl-linkedin'></i></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="form">
                <h4 class="tt">Contact Us</h4>
                <form action="" method="post">
                    <div class="input-box">
                        <input type="text" class="in" name="name" required>
                        <label for="">Name</label>
                    </div>
                    <div class="input-box">
                        <input type="email" class="in" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <input type="tel" class="in" name="phone_number" pattern="[0-9]{10}" required>
                        <label for="">Phone</label>
                    </div>
                    <div class="input-box">
                        <textarea name="" class="in" required name="message" cols="30" rows="10"></textarea>
                        <label for="">Message</label>

                    </div>
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>
   
    <?php
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Insert data into cnt_form table
        $sql = "INSERT INTO cnt_form (name, email, phone_number, message) VALUES ('$name', '$email', '$phone_number', '$message')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to a success page or display a success message
            header("Location: home.php");
            exit(); // Stop further execution
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>

    <?php
    // Include the footer file
    include 'footer.php';
    ?>
</body>

</html>