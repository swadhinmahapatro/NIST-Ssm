<?php
require("./../conn.php");

$id=$_POST['id'];
$title=mysqli_real_escape_string($con,$_POST['title']);
$body=mysqli_real_escape_string($con,$_POST['body']);
$res=mysqli_query($con,"UPDATE `notice` SET `title` = '$title', `body` = '$body' WHERE `notice`.`id` = '$id'") or die(mysqli_error($con));
?>
