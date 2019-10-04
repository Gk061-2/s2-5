<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <link rel="icon" type="image/png" href="icon/contact.png">


    <?php
    include ('BootstrapLinks.php');
    ?>



</head>
<body>

<?php
include ('navBar.php');
?>

<?php

$name=$email=$phone=$msg="";
$emailErr=$nameErr=$phoneErr=$msgErr="";
$check=0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }



    if(empty($_POST["msg"]))
    {
        $msgErr="can not be empty";
    }
    else
        $msg=$_POST["msg"];

    if($nameErr=="" && $emailErr=="" && $phoneErr=="" && $msgErr=="")
        $check=1;

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($check==1)
{
    echo "Your Message has been received<br>We Will Contact you as soon as posible <br>Thank You! ";
    echo "<br><a href='home.php'> Go to Home Page </a>";
}

else {
    ?>

    <h1 style="text-align:center">Contact Us</h1>
    <h3 style="text-align:center">If you have any query, feel free to contact us.</h3>
    <div class="container-fluid">

        <div class="row" style="margin-top: 40px; margin-left: 30%">

            <div class="col-xs-6 col-md-6 col-sm-16" style="clear:right;">

                <form method="post" novalidate action="contact.php">


                    Name:<span class="error">*</span> <input type="text" name="name" class="form-control"
                                                             value="<?php echo $name; ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                    <br><br>
                    Email:<span class="error">*</span> <input type="email" name="email" class="form-control"
                                                              value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                    <br><br>

                    Message:<span class="error">*</span> <input type="text" name="msg" class="form-control"
                                                                style="height: 200px;" value="<?php echo $msg; ?>">
                    <span class="error"><?php echo $msgErr; ?></span>
                    <br><br>
                    <input class='btn btn-primary' type="submit" name="submit" value="Submit">
                    <br><br>

                </form>

            </div>

            <div class="col-xs-12 col-md-6 col-sm-6" style="border:2px solid crimson;clear: left">



            </div>

        </div>
    </div>


    <br>
    <br>




    <?php
}
?>

<?php
include ('footer.php');
?>

</body>
</html>