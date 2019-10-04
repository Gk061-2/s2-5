<?php
session_start();
require_once 'connect.php';



$id = $_POST["id"];
$p = $_POST['pro'];
$d = $_POST['day'];


$sql = "update user
set projectassigned = 'Y',
project = '$p',
duration = '$d'
where id = '$id'";



$res = mysqli_query($con,$sql);
if ($res==true) {



    header('location:man.php');

}