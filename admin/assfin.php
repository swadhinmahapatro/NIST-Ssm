<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$id=$_GET['a_id'];
$res=mysqli_query($con,"UPDATE `assignment` SET `status` = 'finished' WHERE `assignment`.`id` = '$id'") or die(mysqli_error($con));

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
    swal("Done!", "Assignment is removed!", "warning").then((value) => {
    location.href ="./assign_res.php";
});
</script>
</body>
</html>