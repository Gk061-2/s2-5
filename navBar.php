<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="imges/logo.png" alt="logo" style="max-width: 100px; max-height: 50px; margin-right: 10px">
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>

            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php

            if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {
               ?>
                    <li><a href="employeesskills.php">Employees Skills</a></li>




                <li><a href="assigned.php">Notification <span style="color: red">*</span></a></li>
            <?php

                echo "<li><a href=\"logout.php\">Logout</a></li>";
            }
            else{
                echo "<li><a href=\"login.php\">Login</a></li>";
            }

            ?>
            <?php

            if(isset($_SESSION['valid']) && $_SESSION['role']=='user' ) {
                ?>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="float: right;">Hello <?php echo $_SESSION['name'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="updateskills.php">Update Skills</a></li>
                        <li><a href="updatename.php">Update Name</a></li>
                        <li><a href="updatepassword.php">Update Password</a></li>


                    </ul>
                </li>


            <?php }?>
        </ul>




    </div>
</nav>