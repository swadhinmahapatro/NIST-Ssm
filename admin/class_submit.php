<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$n_id=$_SESSION['id'];
$title=$_POST['title'];
$cmt=$_POST['cmt'];
$class=$_POST['class'];
$link=$_POST['link'];
$date=date("d/m/Y");
$res=mysqli_query($con,"INSERT INTO `onlineclass` (`t_id`, `status`, `link`, `title`, `comment`, `date`, `class`) VALUES ('$n_id', 'active', '$link', '$title', '$cmt', '$date', '$class')") or die(mysqli_error($con));
header("location:online_class.php");
?>