<?php
session_start();
require_once 'connect.php';

$id = $_POST["id"];

$name = $_POST["pass"];



$sql = "update user
set pass = '$name'
where id = '$id'";



$res = mysqli_query($con,$sql);
if ($res==true) {

    echo " <script> alert( 'your password updated.');<script>" ;
    header('location:home.php');
}