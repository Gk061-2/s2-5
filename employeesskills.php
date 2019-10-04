<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid']) || $_SESSION['role']!='user' ) {
      header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connect.php");


?>

<html>
<head>
    <title>Employees Skills</title>
    <?php
    include ('BootstrapLinks.php');
    ?>
</head>

<body>
<?php
include ('navBar.php');
?>
<br/><br/>
<div class="box-body responsive" style="margin-left: 10%; margin-right: 10%">
    <h2 style="text-align: center"> Other Employees skills</h2> <br>
    <table class="table table-bordered table-striped" >
        <thead style="font-weight: bold; text-align: center">
        <tr>
            <td>Employee Name</td>
            <td>Skills</td>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = " select * from user where active = 'Y'";
        $res = mysqli_query($con,$sql);
        if($res == true) {
            while ($r = mysqli_fetch_assoc($res)) {


                ?>
                <tr style="text-align: center">
                    <td>
                        <?php echo $r['name'] ?>
                    </td>
                    <td>
                        <?php
                        echo $r['skills']
                        ?>
                    </td>

                </tr>

                <?php

            }
        }

        ?>
        </tbody>
    </table>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="script.js"></script>

</body>
</html>
