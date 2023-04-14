<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "hoi") {
    header("location:error.html");
}

$id=$_GET['id'];
$res=mysqli_query($con, "DELETE FROM `notice` WHERE `notice`.`id` = '$id'") or die(mysqli_error($con));
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
    swal("Done!", "Notice has been deleted", "warning").then((value) => {
    location.href ="./notice.php";
});
</script>
</body>
</html>