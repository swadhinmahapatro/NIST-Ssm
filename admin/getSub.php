<?php
require("./../conn.php");
$sub=intval($_POST['sub']);
$res=mysqli_query($con,"SELECT * from subject where class='$sub'") or die(mysqli_error($con));

while($row=mysqli_fetch_array($res)){
    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'."\n";
}

?>