<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "hoi") {
    header("location:error.html");
}

$n_id=$_SESSION['id'];
$n_res=mysqli_query($con,"SELECT * from hoi where id='$n_id'") or die(mysqli_error($con));
$n_row=mysqli_fetch_array($n_res);
$classRES=mysqli_query($con,"SELECT * from student")  or die(mysqli_error($con));
$total_student=mysqli_num_rows($classRES);
$classRES=mysqli_query($con,"SELECT * from teacher")  or die(mysqli_error($con));
$total_teacher=mysqli_num_rows($classRES);
$todate=date("d/m/Y");
$curr_day=date("l");
$rfesql=mysqli_query($con,"SELECT * from rfc where status='pending'")  or die(mysqli_error($con));
$rfc=mysqli_num_rows($rfesql);
$cl1=mysqli_query($con,"SELECT * from attendance where date='$todate' and class='1'") or die(mysqli_error($con));
if(mysqli_num_rows($cl1)==0){
    $str1='<p class="text-danger">Attendance Not Taken Yet for class 1 <i class="fa-solid fa-triangle-exclamation"></i></p>';
    $per1=0;
    $bg1='danger';
}else{
$res=mysqli_fetch_array($cl1);
$per1=round(($res['present']/($res['present']+$res['absent']))*100);
$str1='';
$bg='info';
}
$cl2=mysqli_query($con,"SELECT * from attendance where date='$todate' and class='2'") or die(mysqli_error($con));
if(mysqli_num_rows($cl2)==0){
    $str2='<p class="text-danger">Attendance Not Taken Yet for class 2 <i class="fa-solid fa-triangle-exclamation"></i></p>';
    $per2=0;
    $bg2='danger';
}else{
$res=mysqli_fetch_array($cl2);
$per2=round(($res['present']/($res['present']+$res['absent']))*100);
$str2='';
$bg2='info';
}
$cl3=mysqli_query($con,"SELECT * from attendance where date='$todate' and class='3'") or die(mysqli_error($con));
if(mysqli_num_rows($cl3)==0){
    $str3='<p class="text-danger">Attendance Not Taken Yet for class 3 <i class="fa-solid fa-triangle-exclamation"></i></p>';
    $per3=0;
   
}else{
$res=mysqli_fetch_array($cl3);
$per3=round(($res['present']/($res['present']+$res['absent']))*100);
$str3='';
}
$cl4=mysqli_query($con,"SELECT * from attendance where date='$todate' and class='4'") or die(mysqli_error($con));
if(mysqli_num_rows($cl3)==0){
    $str4='<p class="text-danger">Attendance Not Taken Yet for class 4 <i class="fa-solid fa-triangle-exclamation"></i></p>';
    $per4=0;
    
}else{
$res=mysqli_fetch_array($cl4);
$per4=round(($res['present']/($res['present']+$res['absent']))*100);
$str3='';
}
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
            <li class="nav-item active">
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
            <li class="nav-item">
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
<h2>Dashboard</h2>
                <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Day</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $curr_day ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Student</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_student ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-graduation-cap fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Teacher</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_teacher ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-person-chalkboard fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending rfc's</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rfc ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <h4 class="small font-weight-bold">Class 1 <?php echo $str1 ?><span
                                            class="float-right"><?php echo $per1 ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $per1 ?>%"
                                            aria-valuenow="<?php echo $per1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Class 2 <?php echo $str2 ?><span
                                            class="float-right"><?php echo $per2 ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $per2 ?>%"
                                            aria-valuenow="<?php echo $per2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Class 3 <?php echo $str3 ?><span
                                            class="float-right"><?php echo $per3 ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $per3 ?>%"
                                            aria-valuenow="<?php echo $per3 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Class 4 <?php echo $str4 ?><span
                                            class="float-right"><?php echo $per4 ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $per4 ?>%"
                                            aria-valuenow="<?php echo $per4 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                    
                </div>
                <!-- /.container-fluid -->
</div>
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
    if (window.matchMedia("(max-width: 767px)").matches){
        $( document ).ready(function() {
   $( "#sidebarToggleTop" ).trigger( "click" );
});
        }
    </script>
</body>

</html>