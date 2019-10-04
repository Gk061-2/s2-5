<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include_once("connect.php");

  ?>

    <title>Home</title>
    <link rel="icon" type="image/png" href="icon/home.png">


    <?php
    include ('BootstrapLinks.php');
    ?>




</head>
<body>
<?php
include ('navBar.php');
?>

<div class="container">

<h1 style="text-align: center">A Competency Model for “Industrie 4.0” Employees</h1>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="imges/2.jpg" alt="Los Angeles" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="imges/3.jpg" alt="Chicago" style="width:100%;">
                    </div>


                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>
        </div>
        <div class="col-lg-2"></div>
    </div>



</div>
</body>
<?php
include ('footer.php');
?>
</html>