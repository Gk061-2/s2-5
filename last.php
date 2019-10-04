<?php session_start(); ?>

<?php

?>

<?php
//including the database connection file
include_once("connect.php");
$id = $_POST['id'];
$name = $_POST['competency'];
$sql = "update user 
set competency = '$name',
cassigned = 'Y'
where id = '$id'";
$res = mysqli_query($con,$sql);
if ($res==true) {

header('location:seeemployees.php');
}
else{
    echo ".$con->error";
}