<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Developers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .tests {
            height: 100vh;
            width: 100%;
            background-color: #f1f1f1;
            color: #434343;
            text-align: center;
        }

        .inner {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }

        .border {
            width: 260px;
            height: 5px;
            background: #303ef7;
            margin: 26px auto;
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .col {
            flex: 33.33%;
            max-height: 33.33%;
            box-sizing: border-box;
            padding: 15px;
        }

        .test {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .test img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .name {
            font-size: 20px;
            color: black;
            margin: 20px 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            color: black;
            font-weight: 400;
        }

        .h {
            padding: 15px 80px;
            font-size: 16px;
            display: inline-block;
            text-decoration: none;
            border-radius: 30px;
            color: white;
            border-top-right-radius: 0;
            transition: 1s;
            background-image: linear-gradient(45deg,#0011ff,#868efa );
        }
        .h:hover {
            border-top-right-radius: 30px;
        }
        .stars {
            color: #303ef7;
            margin-bottom: 20pX;
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
<div class="tests">
    <div class="inner">
        <h1>OUR TEAM</h1>
        <div class="border"></div>

        <div class="row">
            <div class="col">
                <div class="test">
                    <img src="img/user3.jpg" alt="">
                    <div class="name">Shantanu Deshamane</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>Shantanu is the coder who brings our quizzes to life. With his expertise in front-end and back-end development, he turns ideas into reality, ensuring an exceptional user experience on our platform. </p>
                </div>
            </div>

            <div class="col">
                <div class="test">
                    <img src="img/user3.jpg" alt="">
                    <div class="name">Aditya Borgaonkar</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>As the visionary behind Quizzyy, Aditya is passionate about making learning fun through interactive quizzes. With experience in web development and a knack for creating captivating content.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="test">
                    <img src="img/user3.jpg" alt="">
                    <div class="name">Abhishek Chavhan</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>Abhishek is the creative force behind the quizzes you love. With a passion for writing, he curates exciting quiz topics and ensures that each quiz is not only entertaining but also informative to our audience.</p>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php" class="h">Back To Home</a>
</div>
<?php
    // Include the footer file
    include 'footer.php';
    ?>
</body>

</html>