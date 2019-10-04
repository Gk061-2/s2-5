<?php session_start(); ?>

<?php

?>

<?php
//including the database connection file
include_once("connect.php");
$d = $_POST['dcompetency'];
$c = $_POST['competency'];
$ci = $_POST['city'];
$p = $_POST['project'];
$days = $_POST['days'];
?>

<html>
<head>
    <title>Select employee</title>
    <?php
    include ('BootstrapLinks.php');
    ?>
</head>

<body>
<?php
include ('mannav.php');
?>
<br/>
<div class="box-body responsive" style="margin-left: 10%; margin-right: 10%">
    <h2 style="text-align: center"> Employees with select limits </h2>
    <p style="text-align: center"> Following are the employees with the selected competency and city.</p><br>
    <table class="table table-bordered table-striped" >
        <thead style="font-weight: bold; text-align: center">
        <tr>
            <td>Employee Name</td>
            <td>Employee dimension Competency</td>
            <td>Skills</td>
            <td>Competency</td>
            <td>City</td>
            <td>Assign</td>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = " select * from user where active = 'Y' and city = '$ci' and competency = '$c' and cdimension = '$d'";
        $res = mysqli_query($con,$sql);
        if($res == true) {
            while ($r = mysqli_fetch_assoc($res)) {


                ?>
                <tr style="text-align: center">
                    <td>
                        <?php echo $r['name'] ?>
                    </td>
                    <td> <?php echo $r['cdimension'] ?></td>
                    <td>
                        <?php
                        echo $r['skills']
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $r['competency']
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $r['city']
                        ?>
                    </td>
                    <td>
                        <form action="selectemploye.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                            <input type="hidden" name="pro" value="<?php echo $p; ?>">
                            <input type="hidden" name="day" value="<?php echo $days; ?>">
                            <input type="submit" placeholder="" value="Assign" style="background-color: indianred">
                        </form>
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
