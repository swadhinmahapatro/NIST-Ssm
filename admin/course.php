<?php
require("./../conn.php");
session_start();
if (!isset($_SESSION['id']) or $_SESSION['status'] != "teacher") {
    header("location:error.html");
}
$n_id=$_SESSION['id'];
$n_res=mysqli_query($con,"SELECT * from teacher where id='$n_id'") or die(mysqli_error($con));
$n_row=mysqli_fetch_array($n_res);

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
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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
                    <span>Classes</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="notice.php">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Notice</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-microscope"></i>
                    <span>Test</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="test_publish.php">Publish</a>
                        <a class="collapse-item" href="test_rsponse.php">Response</a>
                        <a class="collapse-item" href="test_report.php">Report</a>
                    </div>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="attendance.php">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span>Take Attendance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="online_class.php">
                    <i class="fa-solid fa-signal"></i>
                    <span>Online Classes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profilr.php">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoo"
                    aria-expanded="true" aria-controls="collapseTwoo">
                    <i class="fa-solid fa-clipboard-question"></i>
                    <span>Assignment</span>
                </a>
                <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="assign_publish.php">Publish</a>
                        <a class="collapse-item" href="assign_res.php">Response</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rfc.php">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>RFC</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="timetable.php">
                    <i class="fa-solid fa-table-list"></i>
                    <span>Timetable</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="course.php">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span>Course</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="changepass.php">
                <i class="fa-solid fa-unlock-keyhole"></i>
                    <span>Change Password</span></a>
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
                                    src="../img/<?php echo $n_row['photo'] ?>">
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Course</h1>
                    <div id="accordion">
                    <div class="card shadow ">
                        <div class="card-header bg-gradient-light" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-block " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Class 1 <i class="fa-solid fa-angles-down"></i>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                        $cc=mysqli_query($con,"SELECT * from course where class='1'") or die(mysqli_error($con));
                        $course=mysqli_fetch_array($cc);
                        ?>
                        <embed src="../HOI/course/<?php echo $course['file']; ?>" width="100%" height="500px" /><br>
                        <a download href="../HOI/course/<?php echo $course['file']; ?>" class="btn btn-circle btn-info"><i class="fa-solid fa-download"></i></a> 
                      
                        </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header bg-gradient-light" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-block" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                            Class 2 <i class="fa-solid fa-angles-down"></i>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                        $cc=mysqli_query($con,"SELECT * from course where class='2'") or die(mysqli_error($con));
                        $course=mysqli_fetch_array($cc);
                        ?>
                        <embed src="../HOI/course/<?php echo $course['file']; ?>" width="100%" height="500px" /><br>
                        <a download href="../HOI/course/<?php echo $course['file']; ?>" class="btn btn-circle btn-info"><i class="fa-solid fa-download"></i></a> 
                       
                        
                            
                        </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header bg-gradient-light" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-block" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Class 3 <i class="fa-solid fa-angles-down"></i>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                        $cc=mysqli_query($con,"SELECT * from course where class='3'") or die(mysqli_error($con));
                        $course=mysqli_fetch_array($cc);
                        ?>
                        <embed src="../HOI/course/<?php echo $course['file']; ?>" width="100%" height="500px" /><br>
                        <a download href="../HOI/course/<?php echo $course['file']; ?>" class="btn btn-circle btn-info"><i class="fa-solid fa-download"></i></a> 
                       
                       
                            
                        </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header bg-gradient-light" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-block " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            Class 4 <i class="fa-solid fa-angles-down"></i>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                        $cc=mysqli_query($con,"SELECT * from course where class='4'") or die(mysqli_error($con));
                        $course=mysqli_fetch_array($cc);
                        ?>
                        <embed src="../HOI/course/<?php echo $course['file']; ?>" width="100%" height="500px" /><br>
                        <a download href="../HOI/course/<?php echo $course['file']; ?>" class="btn btn-circle btn-info"><i class="fa-solid fa-download"></i></a> 
                  
                    
                            
                        </div>
                        </div>
                    </div>
</div>
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