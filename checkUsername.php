<?php
include_once ("connect.php");
$q = $_GET['q'];
$res = $con->query("SELECT * FROM user WHERE username = '".$q."'");
//sleep(3);
if($res->num_rows > 0 )
    echo '<span style="color: red;">Not Available</span>';
else
    echo '<span style="color: green;">Available</span>';

?>
