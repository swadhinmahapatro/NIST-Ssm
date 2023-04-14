<?php
require "./../conn.php";
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "hoi") {
    header("location:error.html");
}

$name = mysqli_real_escape_string($con, $_POST['name']);
$class = mysqli_real_escape_string($con, $_POST['class']);
$roll = mysqli_real_escape_string($con, $_POST['roll']);
$addr = mysqli_real_escape_string($con, $_POST['addr']);
$mail = mysqli_real_escape_string($con, $_POST['mail']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$father = mysqli_real_escape_string($con, $_POST['father']);
$aadhar = mysqli_real_escape_string($con, $_POST['aadhar']);
//
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, image is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    die();
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $img=$_FILES["image"]["name"];
        $res=mysqli_query($con,"INSERT INTO `student` (`id`, `name`, `class`, `roll`, `email`, `mobile`, `father`, `aadhar`, `pass`, `gender`, `photo`, `address`) VALUES (NULL, '$name', '$class', '$roll', '$mail', '$mobile', '$father', '$aadhar', 'password', '$gender', '$img', '$addr')") or die(mysqli_error($con));
        header("location:student_view.php");
    } else {
      echo "Sorry, there was an error uploading your file.";
      die();
    }
}
?>