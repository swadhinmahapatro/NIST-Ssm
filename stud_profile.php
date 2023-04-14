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
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="id.css" rel="stylesheet">
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
                    <img id="ssm" src="logo.png" height="40%" width="40%">
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
          <li class="nav-item">
              <a class="nav-link" href="stud_test.php">
                  <i class="fa-solid fa-square-pen"></i>
                  <span>Test</span></a>
          </li>
          <li class="nav-item active">
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
                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
                    

                    <section>
                        <div class="container py-3">
                      
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="card mb-4">
                                <div class="card-body text-center">
                                  <img src="img/<?php echo $row['photo']; ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                  <h5 class="my-3"><?php echo $row['name']; ?></h5>
                                  <p class="text-muted mb-1"><i class="fa-solid fa-graduation-cap"></i> Student</p>
                                  <p class="text-muted mb-4"><i class="fa-solid fa-location-dot"></i> <?php echo $row['address']; ?></p>
                                  <div id="qrcode"></div>
                                </div>
                              </div>
                              
                            </div>
                            <div class="col-lg-8">
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['name']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Student ID</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['id']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Roll</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['roll']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Class</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['class']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['mobile']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Father's Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['father']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Aadhar Number</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['aadhar']; ?></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Download ID Card <i class="fa-solid fa-id-card-clip"></i></p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><i class="fa-regular fa-circle-down" style="cursor:pointer" onclick="dnld()"></i></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    

                </div>

<div id="qr_code" hidden></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
	</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script>
function dnld(){
        var pdf = new jsPDF({
    orientation: "landscape",
    unit: "mm",
    format: [150, 70]
});
pdf.setFillColor(181, 204,213);
pdf.rect(0, 21, 150, 49, "F");
pdf.line(1,21,149,21);
pdf.line(1,69,149,69);
pdf.setFontSize(12);
pdf.text('Name: <?php echo $row['name']; ?>', 50, 30);

pdf.setFontSize(10);
pdf.text('Class: <?php echo $row['class']; ?>', 50, 35);
pdf.text('Roll: <?php echo $row['roll']; ?>', 50, 40);
pdf.line(48,50,105,50,'F');
let base64Image = $('#qr_code img').attr('src');
pdf.addImage(base64Image, 'png', 5, 25, 40, 40);


var img = new Image()

img.src = "img/<?php echo $row['photo']; ?>";
img.onload=()=>{
  pdf.addImage(img, 'png', 105, 25, 40, 40);
}

var img1 = new Image()
img1.src = "logo.png";
pdf.setFillColor(34, 165,220);
pdf.rect(0, 0, 150, 21, "F");
img1.onload=()=>{
pdf.addImage(img1, 'png', 10, 3, 15, 15);
}
var img2 = new Image()
img2.src = "text.png";
img2.onload=()=>{
pdf.addImage(img2, 'png', 45, 3, 65, 15);
pdf.save();
}

}
		var qrcode = new QRCode("qrcode",
		{
        text: "<?php echo $row['id']; ?>",
        width: 200,
        height: 200,
        correctLevel: QRCode.CorrectLevel.H,
      });
      var qrcode = new QRCode("qr_code",
		{
        text: "<?php echo $row['id']; ?>",
        width: 200,
        height: 200,
        correctLevel: QRCode.CorrectLevel.H,
      });
    
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