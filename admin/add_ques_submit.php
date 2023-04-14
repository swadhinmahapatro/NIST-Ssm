<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$mcq=$_POST['mcq'];
$e_id=$_POST['e_id'];
$i=1; 
while($i<=$mcq){
    $key='mquestion'.$i;
    $ques_name=mysqli_real_escape_string($con,$_POST[$key]);
    $opkey=$key.'opo';
    $opo=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'ops';
    $ops=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'opt';
    $opt=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'opf';
    $opf=mysqli_real_escape_string($con,$_POST[$opkey]);
    $opkey=$key.'corr';
    $corr=mysqli_real_escape_string($con,$_POST[$opkey]);
    $ques="INSERT INTO `question` (`e_id`, `q_no`, `question`,`opo`,`ops`,`opt`,`opf`,`corr`) VALUES ('$e_id', '$i', '$ques_name','$opo','$ops','$opt','$opf','$corr')";
    $q_res=mysqli_query($con,$ques) or die(mysqli_error($con));
    $i++;
}
$update_sql="UPDATE `exam` SET `status` = 'ready' WHERE `exam`.`id` = $e_id";
$qu_res = mysqli_query($con, $update_sql) or die(mysqli_error($con));
header("location:test_publish.php");

?>