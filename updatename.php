<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include_once("connect.php");

    ?>

    <title>Update name</title>

    <link rel="icon" type="image/png" href="icon/home.png">


    <?php
    include ('BootstrapLinks.php');
    $id = $_SESSION['id'];
    ?>




</head>
<body>
<?php
include ('navBar.php');
?>

<div class="container">

    <h1 style="text-align: center">Update Name</h1>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

            <br>
            <form method="post" novalidate action='updatenamecheck.php' >
                <input type="hidden" name="id" value="<?Php echo $id?>">

                Name:<span class="error">*</span>

                <input type="text" name= "name" class="form-control" placeholder="Enter Name">

                <br><br>



                <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
                <br><br>

            </form>

        </div>
        <div class="col-lg-2"></div>
    </div>



</div>
</body>
<?php
include ('footer.php');
?>
</html>