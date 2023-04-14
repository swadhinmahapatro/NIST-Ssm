<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$n_id=$_SESSION['id'];
$n_res=mysqli_query($con,"SELECT * from teacher where id='$n_id'") or die(mysqli_error($con));
$n_row=mysqli_fetch_array($n_res);
$t_id=$n_row['id'];
$date=date("d/m/Y");
$class=$_POST['class'];
$at=$_POST['student'];
$present=0;
$absent=0;
$res=mysqli_query($con,"SELECT * from student where class='$class'") or die(mysqli_error($con));
while($row=mysqli_fetch_array($res)){
    if($at[$row['id']]==1){
        $present++;
    }else{
        $absent++;
    }
}
$at_res=mysqli_query($con,"INSERT INTO `attendance` (`t_id`, `class`, `date`, `present`, `absent`) VALUES ('$t_id', '$class', '$date', '$present', '$absent')") or die(mysqli_error($con));
$at_id=mysqli_insert_id($con);
$res=mysqli_query($con,"SELECT * from student where class='$class'") or die(mysqli_error($con));
while($row=mysqli_fetch_array($res)){
    $st_id=$row['id'];
    $pres=intval($at[$row['id']]);
    $ss_res=mysqli_query($con,"INSERT INTO `studentat` (`at_id`, `st_id`, `present`,`date`) VALUES ('$at_id', '$st_id', '$pres','$date')") or die(mysqli_error($con));
}
header("location:attendance.php");
?>