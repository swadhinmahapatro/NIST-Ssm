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
$t_id=$_GET['id'];
$e_res=mysqli_query($con,"SELECT * from exam where id='$t_id'") or die(mysqli_error($con));
$t_row=mysqli_fetch_array($e_res);
$s_id=$t_row['sub_id'];
$te_id=$t_row['teacher_id'];
$s_res=mysqli_query($con,"SELECT * from subject where id='$s_id'") or die(mysqli_error($con));
$sub=mysqli_fetch_array($s_res);
$te_res=mysqli_query($con,"SELECT * from teacher where id='$te_id'") or die(mysqli_error($con));
$teacher=mysqli_fetch_array($te_res);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
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
                <a class="nav-link " href="student_indx.php">
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
                   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="m-0 font-weight-bold text-info text-center"><?php echo $t_row['name']; ?></h2>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                                <div>
                                    <p class="text-dark font-weight-bold">Name: <?php echo $row['name']; ?></p>
                                    <p class="text-dark font-weight-bold">Subject: <?php echo $sub['name']; ?></p>
                                </div>
                                <div>
                                    <p class="text-dark font-weight-bold">Teacher:  <?php echo $teacher['name']; ?></p>
                                    <p class="text-dark font-weight-bold">Full Marks: <?php echo intval($t_row['mark'])*intval($t_row['mcq']); ?></p>
                                </div>
                        </div>

                    </div>
                    <form action="examsubmit.php" method="post">
                        <input type="text" value="<?php echo $t_row['id']; ?>" name="e_id" hidden/>
                    <?php 
                    $ex_id=$t_row['id'];
                    $ex_res=mysqli_query($con,"SELECT * from question where e_id='$ex_id' order by q_no") or die(mysqli_error($con));
                    while($ques=mysqli_fetch_array($ex_res)){
                    ?>

                    <div class="card border-left-warning">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title text-dark"><?php echo $ques['q_no']; ?>.<?php echo $ques['question']; ?></h4>
                            <p class="text-danger"><?php echo $t_row['mark']; ?> Marks</p>
                        </div>
                        <div class="card-body">
                            <div class="basic-list-group">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input type="radio" name="question[<?php echo $ques['q_id']; ?>]"
                                            value="opo" onclick="change(this);"/> <?php echo $ques['opo']; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <input type="radio" name="question[<?php echo $ques['q_id']; ?>]"
                                            value="ops" onclick="change(this);"/> <?php echo $ques['ops']; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <input type="radio" name="question[<?php echo $ques['q_id']; ?>]"
                                            value="opt" onclick="change(this);"/> <?php echo $ques['opt']; ?>
                                    </li>
                                    <li class="list-group-item">
                                        <input type="radio" name="question[<?php echo $ques['q_id']; ?>]"
                                            value="opf" onclick="change(this);"/> <?php echo $ques['opf']; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>
                    <div class="">
                    <input type="submit"  class="btn btn-success btn-block">
                    
                </div>
                </form>


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
    <script>
        function change(obj){
            var ele=obj.parentNode.parentNode.parentNode.parentNode.parentNode;
            ele.classList.remove("border-left-warning");
            ele.classList.add("border-left-success");
        }
        </script>
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