<?php
require("./../conn.php");
$cls=$_POST['class'];
if (isset($_FILES['pdf_file']['name']))
{
  $file_name = $_FILES['pdf_file']['name'];
  $file_tmp = $_FILES['pdf_file']['tmp_name'];

  move_uploaded_file($file_tmp,"course/".$file_name);

  $insertquery =
  "UPDATE `course` SET `file` = '$file_name' WHERE `course`.`class` = '$cls'";
  $iquery = mysqli_query($con, $insertquery) or die(mysqli_error($con));
}else{
    echo "Not Submitted";
}
?>