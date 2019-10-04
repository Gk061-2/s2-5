<?php
session_start();
require_once 'connect.php';

$id = $_POST["id"];

$name = $_POST["name"];
$_SESSION['name'] = $name;


$sql = "update user
set name = '$name'
where id = '$id'";



$res = mysqli_query($con,$sql);
if ($res==true) {

    echo " <script> alert( 'your Name updated.');<script>" ;
    header('location:home.php');
}