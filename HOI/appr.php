<?php
require("./../conn.php");
$id=$_POST['id'];
$query=mysqli_query($con,"SELECT * from rfc where id='$id'") or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
$col=$row['attr'];
$tab=$row['pos'];
$val=$row['value'];
$p_id=$row['p_id'];
$res=mysqli_query($con,"UPDATE `$tab` SET `$col` = '$val' WHERE `id` = '$p_id'") or die(mysqli_error($con));
$hhh=mysqli_query($con,"UPDATE `rfc` SET `status` = 'approve' WHERE `rfc`.`id` = '$id'") or die(mysqli_error($con));
?>