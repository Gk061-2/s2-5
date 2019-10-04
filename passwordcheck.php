<?php
session_start();
require_once 'connect.php';



$name = $_POST["pass"];



$sql = "update user
set pass = '$name'
where role = 'admin'";



$res = mysqli_query($con,$sql);
if ($res==true) {

    echo " <script> alert( 'your password updated.');<script>" ;
    header('location:logout.php');
}