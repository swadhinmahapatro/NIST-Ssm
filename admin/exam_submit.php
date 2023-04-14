<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$id=$_SESSION['id'];
$name=mysqli_escape_string($con,$_POST['title']);
$sub=mysqli_escape_string($con,$_POST['sub']);
$class=mysqli_escape_string($con,$_POST['class']);
$mcq=intval($_POST['nos']);
$mark=mysqli_escape_string($con,$_POST['mark']);
$res=mysqli_query($con,"INSERT INTO `exam` (`name`, `status`, `mcq`, `class`, `sub_id`, `teacher_id`,`mark`) VALUES ('$name', 'active', '$mcq', '$class', '$sub', '$id','$mark')") or die(mysqli_error($con));
header("location:test_publish.php");

?>