
<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$t_id=$_SESSION['id'];
$allowedExts = array("pdf");
$body=mysqli_real_escape_string($con,$_POST['content']);
$title=mysqli_real_escape_string($con,$_POST['title']);
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"assignment/" . $_FILES["pdf_file"]["name"]);
$sql=mysqli_query($con,"INSERT INTO `assignment` (`body`, `title`, `file`,`status`,`teacher`) VALUES ('$body', '$title', '$upload_pdf','published','$t_id')");

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
    swal("Done!", "Assignment is published!", "success").then((value) => {
    location.href ="./assign_publish.php";
});
</script>
</body>
</html>