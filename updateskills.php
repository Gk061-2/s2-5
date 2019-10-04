<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include_once("connect.php");

    ?>

    <title>Update Skills</title>
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

    <h1 style="text-align: center">Update Skills</h1>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h3 style="text-align: center; color: red">You have to select previous skills too.</h3>
            <br>
            <form method="post" novalidate action='updateskillscheck.php' >
                <input type="hidden" name="id" value="<?Php echo $id?>">

                Skills:<span class="error">*</span>
                <select class="form-control " name="skills[]"  required multiple>

                    <?php
                    $sql = "select skill from skills";
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
                <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple Courses.</p>

                <br><br>




                <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
                <br><br>

                <h2 style="text-align: center">Your added Skills</h2>
                <p style="text-align: center">
                    <?php
                    $sql = " select * from user where id = '$id'";
                    $res = mysqli_query($con,$sql);
                    if($res == true) {
                        $r = mysqli_fetch_assoc($res);
                        $d = explode(",",$r['skills']);

                        ?>
                        <?php
                        foreach ($d as $list_item => $r['skills']){
                            echo "<li>";
                            print_r($r['skills']);
                            echo "</li>";}


                    }
                    ?>
                </p>
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