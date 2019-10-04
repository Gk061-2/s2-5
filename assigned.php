<?php session_start();
include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project assigned</title>
    <link rel="icon" type="image/png" href="icon/about.png">


    <?php
    include ('BootstrapLinks.php');
    ?>




</head>
<body>

<?php
include ('navBar.php');
$id =$_SESSION['id']
?>



<h2 style="text-align: center;"></h2>
<br><br>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3 col-sm-3"> </div>
        <div class="col-md-6 col-sm-12">

<?php
if($_SESSION['assign']== 'Y')
{
    $sql = "select * from user where id = '$id'";
    $res = mysqli_query($con,$sql);
    if($res == true)
    {
        $row = mysqli_fetch_assoc($res);
        ?>
        <div style="border: black solid 1px; background-color: #67b168">
            <h2 style="text-align: center">Competency</h2> <br>
            <table class="table table-bordered table-striped">
                <thead style="">

                <tr>
                    <th>Dimension Competency</th>
                    <th>Competency</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <?php echo $row['cdimension']; ?>
                    </td>
                    <td>
                        <?php echo $row['competency']; ?>
                    </td>
                </tr>
                </tbody>

            </table>
            <br>
            <hr>
        <h3 style="text-align: center">Project</h3>

        <?php
        if($_SESSION['project'] == 'Y')
        {

            ?>
            <table class="table table-bordered table-striped">
                <thead style="">

                <tr>
                    <th>Project Name</th>
                    <th>Duration</th>
                    <th>Assigned By</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <?php echo $row['project']; ?>
                    </td>
                    <td>
                        <?php echo $row['duration']; ?> Days
                    </td>
                    <td>
                        Manager
                    </td>
                </tr>
                </tbody>

            </table>

        <?php
        }
        else{
            ?>
            <p style="text-align: center"> No Projects Assigned Yet.</p>
           <?php
        }
    }
} else{
    echo " No Competency assigned yet.";
}
?>
        </div>
        </div>
        <div class="col-md-3 col-sm-3">

        </div>




    </div>
</div>






<?php
include ('footer.php');
?>

</body>
</html>