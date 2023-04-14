<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id']) or $_SESSION['status']!='student'){
    header("location:error.html");
}
$id=$_SESSION['id'];
$info="select * from student where id='$id'";
$info_res=mysqli_query($con,$info) or die(mysqli_error($con));
$row=mysqli_fetch_array($info_res);
$cls=$row['class'];
$res=mysqli_query($con,"SELECT * From exam where (status='published' or status='finished') and class='$cls'") or die(mysqli_error($con));


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .bottomright {
            position: absolute;
  right: 10px; bottom: 10px;
}
    </style>
    <title>SSM</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="logo.png" height="40%" width="40%">
                </div>
                <div class="sidebar-brand-text mx-3">SSM</div>
            </a>

     
            <hr class="sidebar-divider my-0">
            <li class="nav-item ">
                <a class="nav-link " href="index.php">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Notice</span></a>
            </li>

    
            <li class="nav-item ">
                <a class="nav-link" href="stud_assignment.php">
                    <i class="fa-solid fa-bars-progress"></i>
                    <span>Assignment</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="stud_test.php">
                    <i class="fa-solid fa-square-pen"></i>
                    <span>Test</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stud_profile.php">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stud_online_class.php">
                    <i class="fa-solid fa-signal"></i>
                    <span>Online Classes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="stud_at.php">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span>View Attendance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stud_rfc.php">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>Request For Changes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stud_tt.php">
                    <i class="fa-solid fa-table-list"></i>
                    <span>Timetable</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_pass.php">
                    <i class="fa-solid fa-lock"></i>
                    <span>Change Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
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
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
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
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/<?php echo $row['photo']; ?>">
                            </a>
                            
                        </li>

                    </ul>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Test</h1>
                    <?php
                    if(mysqli_num_rows($res)==0){
                        echo '<p class="text-warning font-weight-bolder"> No content to show here! <i class="fa-regular fa-comments"></i> </p> ';
                    }
                    while($test=mysqli_fetch_array($res)){
                        if($test['status']=='published'){
                            $str="success";
                            $s="Ongoing";
                            $btn="Give Test";
                            $link="exam.php?id=".$test['id'];
                            $tt=$test['id'];
                            $xxx=mysqli_query($con,"SELECT * from student_submit where e_id='$tt' and st_id='$id'") or die(mysqli_error($con));
                            if(mysqli_num_rows($xxx)>0){
                                $str="success disabled";
                                $btn="Already Given";
                            }
                        }else{
                            $str="warning";
                            $s="Finished";
                            $btn="View Score";
                            $link="viewres.php?id=".$test['id'];
                        }
                        ?>
                    <div class="card shadow mb-4 border-left-<?php echo $str; ?>">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-<?php echo $str; ?>"><?php echo $s; ?></h6>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <h4><?php echo $test['name']; ?></h4>
                            <a href="<?php echo $link; ?>" class="btn btn-outline-<?php echo $str; ?>">
                            <?php echo $btn; ?>
                            </a>
                            
                        </div>

                    </div>
                    <?php } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Smart School 2022</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

<script>
    if (window.matchMedia("(max-width: 767px)").matches){
        $( document ).ready(function() {
   $( "#sidebarToggleTop" ).trigger( "click" );
});
        }
    </script>
</body>

</html>