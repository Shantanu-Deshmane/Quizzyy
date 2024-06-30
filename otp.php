<?php
session_start();

// Check if the 'id' and 'otp' are set in the session
if (!isset( $_SESSION['id']) || !isset($_SESSION['otp'])) {
    // Redirect if session data is missing (e.g., user directly accessed this page without login)
    header("location: student_login.php");
    exit();
}

if (isset($_POST['verify'])) {
    // Get the entered OTP
    $enteredOTP = $_POST['otp'];

    // Get the stored OTP and 'id' from the session
    $storedOTP = $_SESSION['otp'];
    $userId = $_SESSION['id'];

    if ($enteredOTP == $storedOTP) {
       
        $_SESSION['id'] = $userId; 
        header("location:index.php");
        exit();
    } else {
        $error = "Incorrect OTP";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #303ef7;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0011ff;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form method="post">
        <h2 style="text-align: center;">OTP Verification</h2>
        <div>
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
        </div>
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div>
            <input type="submit" name="verify" value="Verify OTP">
        </div>
    </form>
</body>

</html>