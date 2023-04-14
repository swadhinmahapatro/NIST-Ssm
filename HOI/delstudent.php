<?php
require("./../conn.php");
$id=$_POST['id'];
$res=mysqli_query($con,"DELETE FROM `student` WHERE `student`.`id` = '$id'") or die(mysqli_error($con));
?>