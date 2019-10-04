<?php session_start(); ?>

<?php

?>

<?php
//including the database connection file
include_once("connect.php");
$id = $_POST['id'];
$sql = "update user 
set status = 'O'
where id = '$id'";
$res = mysqli_query($con,$sql);
if ($res==true) {


    ?>

    <html>
    <head>
        <title>Employees</title>
        <?php
        include('BootstrapLinks.php');
        ?>
    </head>

    <body>
    <?php
    include('adminnav.php');
    ?>
    <br/>
    <div class="box-body responsive" style="margin-left: 10%; margin-right: 10%">
        <h2 style="text-align: center"> Add Employee dimension Competency </h2> <br>
<div class="row">
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-6 col-md-6">


        <form action="assignc.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            Dimension Competency:<span class="error">*</span>
            <select class="form-control " name="dcompetency"  required>

                <?php
                $sql = "select cdimension from skills";
                $result = mysqli_query($con, $sql);
                if($result== true)
                {
                    while ( $row = mysqli_fetch_array($result) ) {


                        ?>
                        <option value=" <?php echo "" .$row['cdimension']; ?>"> <?php echo "" .$row['cdimension']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>


            <br><br>
            <input  class='btn btn-primary' type="submit" name="submit" value="Submit" style="max-width: 50%; margin-left: 25%">
            <br><br>
        </form>
    </div>
</div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="script.js"></script>

    </body>
    </html>
    <?php
}
    ?>