<?php
require("./../conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$class=$_POST['class'];
$n_res=mysqli_query($con,"INSERT INTO `subject` (`name`, `class`) VALUES ('$name', '$class')") or die(mysqli_error($con));
?>