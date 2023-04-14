<?php
require("./../conn.php");
$id=$_POST['id'];
$hhh=mysqli_query($con,"UPDATE `rfc` SET `status` = 'reject' WHERE `rfc`.`id` = '$id'") or die(mysqli_error($con));
?>