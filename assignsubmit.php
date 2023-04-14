<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id']) or $_SESSION['status']!='student'){
    header("location:error.html");
}
$id=$_SESSION['id'];
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"admin/assres/" . $_FILES["pdf_file"]["name"]);
$a_id=$_POST['a_id'];
$res=mysqli_query($con,"INSERT INTO `assignstudent` (`ass_id`, `student_id`, `file`) VALUES ('$a_id', '$id', '$upload_pdf')") or die(mysqli_error($con));
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
    swal("Done!", "Assignment is submitted!", "success").then((value) => {
    location.href ="./stud_assignment.php";
});
</script>
</body>
</html>