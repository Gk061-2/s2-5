<?php session_start();

if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {

    header('Location: home.php');
}

if(isset($_SESSION['valid']) && $_SESSION['role']=='admin' ) {

    header('Location: view.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="icon" type="image/png" href="icon/login.png">


    <?php
    include ('BootstrapLinks.php');
    ?>




</head>
<body>

<?php
include ('navBar.php');
?>


<br> <br>
<h2 style="text-align: center; margin-left: 5%">Login</h2>




<?php
include("connect.php");
$cookie_name="user";
$userName=$pass="";
$Err="";
$checkbox="";
$count=0;

if(isset($_POST['submit'])) {
    $count=1;
    $userName = ($_POST['username']);
    $pass = ($_POST['pass']);

    if(isset($_POST['checkbox']))
    {
        $checkbox=$_POST['checkbox'];
    }


    if($userName == "" || $pass == "") {
        $Err="Either username or password field is empty.";

    } else {

        $result = $con->query("SELECT * FROM user WHERE username='$userName' AND pass=('$pass')");



        $row = $result->fetch_assoc();

        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['skills']= $row['skills'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role']=$row['role'];
            $_SESSION['project'] = $row['projectassigned'];
            $_SESSION['assign'] = $row['cassigned'];
        } else {
            $Err="Invalid username or password.";
        }

        if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {

            if($checkbox=='check')
            {
                setcookie($cookie_name,$userName, time() + (86400 * 30), "/");
            }

            header('Location: home.php');
        }

        if(isset($_SESSION['valid']) && $_SESSION['role']=='admin' ) {

            if($checkbox=='check')
            {
                setcookie($cookie_name,$userName, time() + (86400 * 30), "/");
            }

            header('Location: view.php');
        }

        if(isset($_SESSION['valid']) && $_SESSION['role']=='manager' ) {

            if($checkbox=='check')
            {
                setcookie($cookie_name,$userName, time() + (86400 * 30), "/");
            }

            header('Location: man.php');
        }
    }
}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-4"></div>
        <div class=" col-lg-3 col-sm-6 offset-md-3 col-md-6 offset-mid-4" style="margin-top: 50px; border: black 1px">

            <form method="post" action='login.php' >


                Username:<input type="text" name="username" class="form-control"
                                value="<?php  if(isset($_COOKIE[$cookie_name]) && $count==0){ echo $_COOKIE[$cookie_name]; } else { echo $userName;} ?>">
                <br><br>
                Password:<input type="password" name="pass" class="form-control" >
                <br>

                <span class="error"><?php echo $Err;?></span>


                <input type="checkbox" name="checkbox" value="check" > Remember me<br><br>

                <input  class='btn btn-primary'  type="submit" name="submit" value="Submit">
                <br><br>



                <a href="forgot-password.php" >Forgotten Account?</a><br><br>

                <a href="register.php" >Create Account</a><br><br>

            </form>


        </div>
    </div>
</div>

<?php
include ('footer.php');
?>

</body>
</html>