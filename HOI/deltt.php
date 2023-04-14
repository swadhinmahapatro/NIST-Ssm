<?php
require("./../conn.php");
$cls=$_POST['class'];
$res=mysqli_query($con,"DELETE FROM `time_table` WHERE `time_table`.`class_id` = '$cls'") or die(mysqli_error($con));

?>