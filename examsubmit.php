<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id']) or $_SESSION['status']!='student'){
    header("location:error.html");
}
$id=$_SESSION['id'];
$e_id=$_POST['e_id'];
$user_ans=$_POST['question'];
$score=0;
$qures=mysqli_query($con,"SELECT * from question where e_id='$e_id' order by q_no") or die(mysqli_error($con));
while($res=mysqli_fetch_array($qures)){
    if($user_ans[$res['q_id']]==$res['corr']){
        $score++;
    }
}
$ttt=mysqli_query($con,"INSERT INTO `student_test` (`e_id`, `st_id`, `corr`) VALUES ('$e_id', '$id', '$score')") or die(mysqli_error($con));
$stb_id=mysqli_insert_id($con);
$qures=mysqli_query($con,"SELECT * from question where e_id='$e_id' order by q_no") or die(mysqli_error($con));
while($res=mysqli_fetch_array($qures)){
    $select=$user_ans[$res['q_id']];
    $corr=$res['corr'];
    $q_id=$res['q_id'];
    $insert=mysqli_query($con,"INSERT INTO `student_submit` (`q_id`, `e_id`, `select`, `correct`, `st_id`,`stb_id`) VALUES ('$q_id', '$e_id', '$select', '$corr', '$id','$stb_id')") or die(mysqli_error($con));

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSM</title>
</head>
<body>
    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    swal("Done!", "Your test has been recorded", "success").then((value) => {
    location.href ="./stud_test.php";
});
</script>
</body>
</html>