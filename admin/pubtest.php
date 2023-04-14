<?php
require("./../conn.php");
session_start();
if(!isset($_SESSION['id']) or $_SESSION['status']!="teacher"){
    header("location:error.html");
}
$id=$_POST['id'];
$res=mysqli_query($con,"UPDATE `exam` SET `status` = 'published' WHERE `exam`.`id` = '$id'") or die(mysqli_error($con));

?>