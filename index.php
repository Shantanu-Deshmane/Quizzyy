<?php
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="path/to/your/favicon.png">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    
</head>
<style>
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
<body>

    <div class="wrapper">
        <nav>
            <h2 class="logo">Quizzyy</h2>
            <ul>
              
                <li><a href="#" class="active">Home</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="one_dev.php">Our Team</a></li>
                <?php if(isset($_SESSION['email'])): ?>
                <li><a class="Quiz-opt" href="Service.html">Quiz</a></li>
                <li><a href="logout.php">Logout</a></li>
                <!-- <li>Welcome </li> -->
                <?php else: ?>
                <li><a href="register.html">Sign Up</a></li>
                <li><a href="#" style="display: none;">Quiz</a></li>
                <?php endif; ?>
            </ul>
        </nav>


       <div id="collapse">
       <h2 class="logo">Quizzyy</h2>

<div class="collapse navbar-collapse"  id="navbarToggleExternalContent">
    <div class="bg-white p-4">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
    <li class="nav-item"><a href="#" class="active text-decoration-none text-dark bg-primary p-1">Home</a></li>
    <li class="nav-item"><a href="About.php" class="text-decoration-none text-dark ">About</a></li>
    <li class="nav-item"><a href="contact.php" class="text-decoration-none text-dark ">Contact Us</a></li>
    <li class="nav-item"><a href="one_dev.php" class="text-decoration-none text-dark ">Our Team</a></li>
    <?php if(isset($_SESSION['email'])): ?>
    <li class="nav-item"><a class="Quiz-opt text-decoration-none text-dark " href="Service.html">Quiz</a></li>
    <li class="nav-item"><a class="text-decoration-none text-dark " href="logout.php">Logout</a></li>
    <!-- <li>Welcome </li> -->
    <?php else: ?>
    <li class="nav-item"><a class="text-decoration-none text-dark " href="register.html">Sign Up</a></li>
    <li class="nav-item"><a href="#" style="display: none;">Quiz</a></li>
    <?php endif; ?>
</ul>
</div>
</div>
<nav class="navbar navbar-white bg-white">
<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>
</nav>
       </div>
        

        <div class="main">
        <div class="content">
            <h1 class="anim">Ready For <br>A Brain Workout</h1>
               <p class="anim">Think you know it all? Prove it with our challenging quizzes!
                Challenge your knowledge boundaries with Quizzyy's quizzes. </p>
            <?php if(isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <?php if(isset($_SESSION['email'])): ?>
                <a href="Service.html" class="btn anim">Play now</a>
                <?php else: ?>
                    <a href="student_login.php" class="btn anim">Play now</a>
                <?php endif; ?>
        </div>
        <img src="img/person.png" alt="" class="img anim">
    </div>
        </div>
        <?php
        // Include the footer file
        include 'footer.php';
        ?>
       

</body>
</html>

               