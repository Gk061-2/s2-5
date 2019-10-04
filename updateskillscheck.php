<?php
require_once 'connect.php';

 $id = $_POST["id"];

$skills = $_POST["skills"];
$b = implode(",", $skills);


$sql = "update user
set skills = '$b',
status = 'N'
where id = '$id'";



$res = mysqli_query($con,$sql);
if ($res==true) {

 echo " <script> alert( 'your skills updated.');<script>" ;
    header('location:home.php');
}
else{
    echo "".$con->error;
}