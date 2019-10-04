<?php session_start();

if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {

    header('Location: home.php');
}

?>

<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Resister</title>
    <link rel="icon" type="image/png" href="icon/register.png">


    <?php
    include ('BootstrapLinks.php');
    ?>




</head>
<body>


<?php
include ('navBar.php');
?>


<?php

$name=$email=$userName=$visa=$cnic=$add=$phone=$pass=$cpass="";
$nameErr=$emailErr=$userNameErr=$visaErr=$cnicErr=$addErr=$phoneErr=$passErr=$cpassErr="";
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

    if (empty($_POST["cnic"])) {
        $nameErr = "Gender is required";
    } else {
        $cnic = test_input($_POST["cnic"]);

    }
    if (empty($_POST["add"])) {
        $addErr = "city is required";
    } else {
        $add = test_input($_POST["add"]);

    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["username"])) {
        $userNameErr = "userName is required";
    } else {
        $userName = $_POST["username"];

        if(!preg_match("/^[a-zA-Z0-9]*$/",$userName)){
            $userNameErr="Only letters and digits are allowed";
        }
    }




    if (empty($_POST["skills"])) {
        $phoneErr = "skills are required";
    } else {
        $phone = $_POST["skills"];
        $b = implode(",", $phone);
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

    $res = $con->query("SELECT * FROM user WHERE username = '".$userName."'");

    if($res->num_rows > 0)
    {
        $userNameErr="Not Available";
    }

    if($nameErr=="" && $emailErr=="" && $userNameErr=="" && $addErr=="" && $phoneErr=="" && $passErr=="" && $cpassErr=="" && $res->num_rows == 0)
    {
        $check=1;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($check==1)
{

    $query = "INSERT INTO user(name, email, username, pass,skills,gender,city,role) VALUES 
                    ('$name', '$email', '$userName', '$pass','$b','$cnic','$add','user')";
    $con->query($query)
    or die("Could not execute the insert query.");



    echo "<h2>Registration successfully</h2>";
    echo "<br/>";
    echo "<a href='login.php'><h3>Login</h3></a>";



}
else{
    ?>
    <br>

    <h2 style="text-align: center; margin-left: 6%">Register</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-md-4"></div>
            <div class=" col-lg-3 offset-sm-2 col-sm-6 offset-sm-2 offset-md-3 col-md-3 offset-md-3" style="margin-top: 50px;">

                <form method="post" novalidate action='register.php' >



                    Name:<span class="error">*</span> <input type="text" name="name" class="form-control" value="<?php echo $name;?>" >
                    <span class="error"><?php echo $nameErr;?></span>
                    <br><br>
                    Email:<span class="error">*</span> <input type="email" name="email" class="form-control" value="<?php echo $email;?>" >
                    <span class="error"><?php echo $emailErr;?></span>
                    <br><br>
                    Username:<span class="error">*</span> <input type="text" name="username" class="form-control"
                                                                 value="<?php echo $userName;?>" onkeyup="isUsernameAvailable(this.value)" >
                    <span class="error" id="txtHint"> <?php echo $userNameErr;?></span>
                    <br><br>

                    Gender:<span class='error'>*</span> <select type='text' name='cnic' class='form-control' value='<?php echo $cnic;?>' >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <br><br>
                    City:<span class='error'>*</span> <select type='text' name='add' class='form-control' value='<?php echo $add;?>' >
                        <option value="Sydney">Sydney</option>
                        <option value="Melbourne">Melbourne</option>
                    </select>
                    <br><br>

                    Skills:<span class="error">*</span>
                    <select class="form-control " name="skills[]"  required multiple>

                        <?php
                        $sql = "select skill from skills ";
                        $result = mysqli_query($con, $sql);
                        if($result== true)
                        {
                            while ( $row = mysqli_fetch_array($result) ) {


                                ?>
                                <option value=" <?php echo "" .$row['skill']; ?>"> <?php echo "" .$row['skill']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <p>Hold Ctrl button to select multiple Courses.</p>

                    <br><br>


                    Password:<span class="error">*</span> <input type="password" name="pass" class="form-control" value="<?php echo $pass;?>" >
                    <span class="error"> <?php echo $passErr;?></span>
                    <br><br>
                    Confirm Password:<span class="error">*</span> <input type="password" name="cpass" class="form-control" value="<?php echo $cpass;?>" >
                    <span class="error"> <?php echo $cpassErr;?></span>
                    <br><br>


                    <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
                    <br><br>

                </form>


            </div>
        </div>
    </div>


    <?php
}
?>

<?php
include ('footer.php');
?>

</body>
</html>