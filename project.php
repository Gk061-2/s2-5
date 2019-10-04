<?php session_start(); ?>

<?php

?>

<?php
//including the database connection file
include_once("connect.php");



    ?>

    <html>
    <head>
        <title>See Competency</title>
        <?php
        include('BootstrapLinks.php');
        ?>
    </head>

    <body>
    <?php
    include('mannav.php');
    ?>
    <br/>
    <div class="box-body responsive" style="margin-left: 10%; margin-right: 10%">
<div class="row">
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-6 col-md-6">

    <form action="project2.php" method="post" >
            <input type="hidden">
            <h3 style="text-align: center"> Add Project</h3>
            Project:<span class="error">*</span>
            <input type="text" name ="project" class="form-control" required> <br><br>
            Duration(Days):<span class="error">*</span>
            <input type="text" name ="days" class="form-control" required> <br><br>

            <h3 style="text-align: center">Select Dimension Competency and Competency</h3>
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
            Competency:<span class="error">*</span>
            <select class="form-control " name="competency"  required>

                <?php
                $sql = "select competency from skills";
                $result = mysqli_query($con, $sql);
                if($result== true)
                {
                    while ( $row = mysqli_fetch_array($result) ) {


                        ?>
                        <option value=" <?php echo "" .$row['competency']; ?>"> <?php echo "" .$row['competency']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>


            <br><br>
           Select City:<span class="error">*</span>
            <select class="form-control " name="city"  required>
                <option value="Sydney">Sydney</option>
                <option value="Melbourne">Melbourne</option>

            </select>


            <br><br>
            <input  class='btn btn-primary' type="submit" name="submit" value="Submit">
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
