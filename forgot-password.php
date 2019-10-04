<?php session_start();

if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {

    header('Location: home.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>forgetPassword</title>
    <link rel="icon" type="image/png" href="icon/forget.png">


    <?php
    include ('BootstrapLinks.php');
    ?>




</head>
<body>

<?php
include ('navBar.php');
?>

<br>
<h2 style="text-align: center; margin-left: 6%">Forgot Password</h2>



<?php
include("connect.php");

$userName=$cnic=$pass=$cpass="";
$userNameErr=$cnicErr=$passErr=$cpassErr="";
$Err="";

if(isset($_POST['submit'])) {
    $userName = $con->real_escape_string($_POST['username']);


    if($userName == "" ) {
        $userNameErr="username is empty.";

    }




    if(empty($_POST["pass"])){
        $passErr="Password is required";
    }
    else{
        $pass=$_POST["pass"];

        if(strlen($pass)<6){
            $passErr = "more then 6 char";
        }

        else if (!preg_match("/^[a-zA-Z0-9]*$/",$pass)) {
            $passErr = "Only Digits and Alphabet";
        }
    }

    if(!empty($_POST["pass"])){

        if(empty($_POST["cpass"])){
            $cpassErr="Confirm Password is required";
        }
        else{
            $cpass=$_POST["cpass"];

            if($cpass!=$pass)
            {
                $cpassErr="Password and conform password does not match";
            }
        }
    }



    if($userNameErr=="" && $cnicErr=="" && $passErr=="" && $cpassErr=="") {


        $result = $con->query("SELECT * FROM user WHERE username='$userName'")
        or die("Could not execute the select query.");


        $row = $result->fetch_assoc();

        if(is_array($row) && !empty($row)) {
            $id = $row['id'];

            $con->query("update user set pass= '$pass' where id='$id'");
            header("Location:login.php");



        } else {


            $Err="Invalid username .";


        }


    }
}
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-4"></div>
        <div class=" col-lg-3 col-sm-6 offset-md-4 col-md-3 offset-mid-4" style="margin-top: 50px; border: black 1px">

            <form method="post" action='forgot-password.php' >


                Username:<input type="text" name="username" class="form-control" value="<?php echo $userName;?>" >
                <span class="error"><?php echo $userNameErr;?></span>
                <br><br>

                New Password:<input type="password" name="pass" class="form-control">
                <span class="error"><?php echo $passErr;?></span>
                <br><br>
                Confirm Password:<input type="password" name="cpass" class="form-control" >
                <span class="error"><?php echo $cpassErr;?></span>
                <br><br>

                <span class="error"><?php echo $Err;?></span>
                <br>

                <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
                <br><br>



            </form>


        </div>
    </div>
</div>





<?php
include ('footer.php');
?>

</body>
</html>