<?php
require("./../conn.php");
session_start();
if(!isset($_SESSION['id']) or $_SESSION['status']!="teacher"){
    header("location:./../index.php");
}
$s_id=$_SESSION['id'];
$title=mysqli_real_escape_string($con,$_POST['title']);
$body=mysqli_real_escape_string($con,$_POST['content']);
$res=mysqli_query($con,"INSERT INTO `notice` (`title`, `body`, `sender`, `date`) VALUES ('$title', '$body', '$s_id', current_timestamp())") or die(mysqli_error($con));

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
    swal("Done!", "Notice has been published", "success").then((value) => {
    location.href ="./notice.php";
});
</script>
</body>
</html>