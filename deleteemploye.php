<?php
session_start();
require_once 'connect.php';

$id = $_POST["id"];




$sql = "update user
set active = 'N'
where id = '$id'";



$res = mysqli_query($con,$sql);
if ($res==true) {


    header('location:seeemployees.php');
}