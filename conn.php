<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="ssm";
$con = new mysqli($servername, $username, $password,$database) or die(mysqli_error($con));
?>