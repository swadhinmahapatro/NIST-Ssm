<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "hoi") {
    header("location:error.html");
}

$n_id=$_SESSION['id'];
$n_res=mysqli_query($con,"SELECT * from hoi where id='$n_id'") or die(mysqli_error($con));
$n_row=mysqli_fetch_array($n_res);
$cls= $_GET['class'];
$subject_query="SELECT * from subject where class='$cls'";
$teacher_query="SELECT * from teacher";
$ch=mysqli_query($con,"SELECT * from time_table where class_id='$cls'") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SSM - Solution for many</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../logo.png" height="40%" width="40%">
                </div>
                <div class="sidebar-brand-text mx-3">SSM</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fa-solid fa-landmark"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="notice.php">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Notice</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
                    aria-expanded="true" aria-controls="collapseTw">
                    <i class="fa-solid fa-microscope"></i>
                    <span>Student</span>
                </a>
                <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="student_view.php">View/Edit</a>
                        <a class="collapse-item" href="student_add.php">Add Student</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-microscope"></i>
                    <span>Teacher</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="teacher.php">View/Edit</a>
                        <a class="collapse-item" href="teacher_add.php">Add Teacher</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="analytics.php">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span>Exam Analytics</span></a>
            </li>
           
            
            <li class="nav-item">
                <a class="nav-link" href="rfc.php">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>RFC</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="timetable.php">
                    <i class="fa-solid fa-table-list"></i>
                    <span> SetTimetable</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="subject.php">
                <i class="fa-solid fa-book-open"></i>
                    <span> Subjects</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="course.php">
                <i class="fa-solid fa-book-open-reader"></i>
                    <span> Course</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="qrScanner.php">
                <i class="fa-solid fa-qrcode"></i>
                    <span> QR Scanner</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        

        </ul>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $n_row['name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/profile.jpg">
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Timetable</h1> 
                <?php
                if(mysqli_num_rows($ch)>0){
                    $clas=$cls;
                    $mon="SELECT * FROM time_table WHERE day='Monday' and class_id='$clas' ORDER BY period";
                    $tue="SELECT * FROM time_table WHERE day='Tuesday' and class_id='$clas' ORDER BY period";
                    $wed="SELECT * FROM time_table WHERE day='Wednesday' and class_id='$clas' ORDER BY period";
                    $thu="SELECT * FROM time_table WHERE day='Thursday' and class_id='$clas' ORDER BY period";
                    $fri="SELECT * FROM time_table WHERE day='Friday' and class_id='$clas' ORDER BY period";
                    $sat="SELECT * FROM time_table WHERE day='Saturday' and class_id='$clas' ORDER BY period";
                    $curr_day=date("l");
                    $mon_result=mysqli_query($con, $mon) or die(mysqli_error($con));
                    $tue_result=mysqli_query($con, $tue) or die(mysqli_error($con));
                    $wed_result=mysqli_query($con, $wed) or die(mysqli_error($con));
                    $thu_result=mysqli_query($con, $thu) or die(mysqli_error($con));
                    $fri_result=mysqli_query($con, $fri) or die(mysqli_error($con));
                    $sat_result=mysqli_query($con, $sat) or die(mysqli_error($con));
                    ?>
  <div class="card shadow mb-4">
                       
                       <div class="container">
                           <div class="timetable-img text-center">
                               <img src="img/content/timetable.png" alt="">
                           </div>
                           <div class="table-responsive">
                               <table class="table table-bordered text-center">
                                   <thead>
                                       <tr class="bg-light-gray">
                                           <th class="text-uppercase">Day
                                           </th>
                                           <th class="text-uppercase">09:00-10:00</th>
                                           <th class="text-uppercase">10:00-11:00</th>
                                           <th class="text-uppercase">11:00-12:00</th>
                                           <th class="text-uppercase">01:00-02:00</th>
                                       </tr>
                                    </thead>
                                   <tbody>
                                   <?php if(strcmp($curr_day,"Monday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Monday</td>
                   <?php while($mon_row= mysqli_fetch_array($mon_result)){
                       $t_id=$mon_row['t_name'];
                       $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                       $ans=mysqli_fetch_array($ress);
                           echo '<td><strong>'.$mon_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
               </tr>
               <?php if(strcmp($curr_day,"Tuesday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Tuesday</td>
                   <?php while($tue_row= mysqli_fetch_array($tue_result)){
                            $t_id=$tue_row['t_name'];
                            $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                            $ans=mysqli_fetch_array($ress);
                                echo '<td><strong>'.$tue_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
               </tr>
               <?php if(strcmp($curr_day,"Wednesday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Wednesday</td>
                   <?php while($wed_row= mysqli_fetch_array($wed_result)){
                            $t_id=$wed_row['t_name'];
                            $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                            $ans=mysqli_fetch_array($ress);
                                echo '<td><strong>'.$wed_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
               </tr>
               <?php if(strcmp($curr_day,"Thursday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Thursday</td>
                   <?php while($thu_row= mysqli_fetch_array($thu_result)){
                           $t_id=$thu_row['t_name'];
                           $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                           $ans=mysqli_fetch_array($ress);
                               echo '<td><strong>'.$thu_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
               </tr>
               <?php if(strcmp($curr_day,"Friday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Friday</td>
                   <?php while($fri_row= mysqli_fetch_array($fri_result)){
                           $t_id=$fri_row['t_name'];
                           $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                           $ans=mysqli_fetch_array($ress);
                               echo '<td><strong>'.$fri_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
               </tr>
               <?php if(strcmp($curr_day,"Saturday")==0){
                echo "<tr class='table-success'>";
               } else {
                   echo "<tr>";
               }?>   
                   <td class="align-middle">Saturday</td>
                   <?php while($sat_row= mysqli_fetch_array($sat_result)){
                            $t_id=$sat_row['t_name'];
                            $ress=mysqli_query($con,"SELECT name from teacher where id='$t_id'") or die(mysqli_error($con));
                            $ans=mysqli_fetch_array($ress);
                                echo '<td><strong>'.$sat_row['sub_name'].'</strong><br>'.$ans['name'].'</td>';
                   } ?>
                                       
                                   </tbody>
                               </table>
                               <div class="text-center bg" style="padding-bottom: 20px;">
         <button type="submit" class="btn btn-default btn-warning btn-block" onclick="ttres(<?php echo $cls; ?>);">Reset <i class="fa-solid fa-repeat"></i> </button>
         </div>
                           </div>
                       </div>
                   </div>
                    <?php

                }else{
                ?>
                    
                    <div class="card shadow mb-4">
                       
                        <div class="container">
                            <div class="timetable-img text-center">
                                <img src="img/content/timetable.png" alt="">
                            </div>
                            <div class="table-responsive">
                            <form method="POST" action="timetable_submit.php">
                                <input type="text" value="<?php echo $cls; ?>" name="class" hidden> 
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr class="bg-light-gray">
                                            <th class="text-uppercase">Day
                                            </th>
                                            <th class="text-uppercase">09:00-10:00</th>
                                            <th class="text-uppercase">10:00-11:00</th>
                                            <th class="text-uppercase">11:00-12:00</th>
                                            <th class="text-uppercase">01:00-02:00</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">Monday</td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="mon_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="mon_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="mon_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="mon_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td><strong>Subject</strong><select name="mon_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="mon_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="mon_sub_4" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="mon_tec_4" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
            
                                        <tr>
                                            <td class="align-middle">Tuesday</td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="tue_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="tue_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="tue_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="tue_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td>
                                            <strong>Subject</strong><select name="tue_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="tue_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="tue_sub_4" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="tue_tec_4" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
            
                                        <tr>
                                            <td class="align-middle">Wednesday</td>
                                            <td>
                                            <strong>Subject</strong><select name="wed_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="wed_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="wed_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="wed_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td>
                                            <strong>Subject</strong><select name="wed_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="wed_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="wed_sub_4" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="wed_tec_4" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Thursday</td>
                                            <td>
                                            <strong>Subject</strong><select name="thu_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="thu_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="thu_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="thu_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td>
                                                <<strong>Subject</strong><select name="thu_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="thu_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="thu_sub_4" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="thu_tec_4" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Friday</td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="fri_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="fri_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="fri_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="fri_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td>
                                            <strong>Subject</strong><select name="fri_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="fri_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                            <strong>Subject</strong><select name="fri_sub_4" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="fri_tec_4" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Saturday</td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="sat_sub_1" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="sat_tec_1" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                            <td>
                                                
                                            <strong>Subject</strong><select name="sat_sub_2" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="sat_tec_2" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
            
                                            <td>
                                            <strong>Subject</strong><select name="sat_sub_3" required="true" class="form-control">
                                    <?php 
                                    $subject_result= mysqli_query($con, $subject_query);
                                    $teacher_result= mysqli_query($con, $teacher_query);
                                    while($subject_row=mysqli_fetch_array($subject_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $subject_row['name'] ?>"><?php echo $subject_row['name'] ?></option>
                                    <?php }?>
                                             </select><br>
                                    
                                 <strong>Teacher</strong><select name="sat_tec_3" required="true" class="form-control">
                                    <?php 
                                    while($teacher_row=mysqli_fetch_array($teacher_result)){                                                                  
                                        ?>
                                    <option value="<?php echo $teacher_row['id'] ?>"><?php echo $teacher_row['name']?></option>
                                    <?php }?>
                                             </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-offset-5 col-md-3 bg" style="padding-bottom: 20px;">
         <button type="submit" class="btn btn-default btn-primary btn-block">Save Time Table</button>
         </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Smart School 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
        function ttres(clas){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4 && xhr.status==200){
                    location.reload();
                }
            }
            xhr.open("POST","deltt.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send("class="+clas);
        }
    </script>                                    
<script>
    if (window.matchMedia("(max-width: 767px)").matches){
        $( document ).ready(function() {
   $( "#sidebarToggleTop" ).trigger( "click" );
});
        }
    </script>
</body>

</html>