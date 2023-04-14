<?php
session_start();
if(isset($_SESSION['id'])){
  if($_SESSION['status']=='student'){
    header("location:stud_index.php");
  }
  else if($_SESSION['status']=='teacher'){
    header("location:./admin/index.html");
  }else{
    header("location:./HOI/index.html");
  }
}
?>