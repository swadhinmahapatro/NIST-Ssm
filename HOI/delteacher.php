<?php
require("./../conn.php");
$id=$_POST['id'];
$res=mysqli_query($con,"DELETE FROM `teacher` WHERE `teacher`.`id` = '$id'") or die(mysqli_error($con));
?>