<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include_once("connect.php");

    ?>

    <title>Update Password</title>
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

    <h1 style="text-align: center">Update Password</h1>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

            <br>
            <form method="post" novalidate action='updatepasswordcheck.php' >
                <input type="hidden" name="id" value="<?Php echo $id?>">

                Password:<span class="error">*</span>

                <input type="password" id="password" onmouseleave="normal()" name= "pass" required class="form-control" placeholder="Enter Name">

                <br><br>
                Confirm Password:<span class="error">*</span>

                <input type="password" onmouseleave="check()" id="passwordcheck" name= "" required class="form-control" placeholder="Enter Name">
                <br><br>


                <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
                <br><br>

            </form>

        </div>
        <div class="col-lg-2"></div>
    </div>



</div>
<script>

    var normal= function () {
        if(     document.getElementById('password').value.length<5) {
            document.getElementById('password').style.backgroundColor = 'red';
            alert("at least 6 character");
        }

        else
        {            document.getElementById('password').style.backgroundColor = 'green';
        }



    }
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('passwordcheck').value){
            document.getElementById('passwordcheck').style.backgroundColor = 'green';

        } else {
            document.getElementById('passwordcheck').style.backgroundColor = 'red';

        }
    }
</script>
</body>
<?php
include ('footer.php');
?>
</html>