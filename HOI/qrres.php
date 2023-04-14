<?php
require("./../conn.php");
$n_id=$_POST['id'];
$n_res=mysqli_query($con,"SELECT * from teacher where id='$n_id'") or die(mysqli_error($con));
$str='<i class="fa-solid fa-person-chalkboard"></i> Teacher';
if(mysqli_num_rows($n_res)==0){
    $n_res=mysqli_query($con,"SELECT * from student where id='$n_id'") or die(mysqli_error($con));
    $str='<i class="fa-solid fa-graduation-cap"></i> Student';
}
if(mysqli_num_rows($n_res)==0){
  echo '<p class="text-danger">Invalid QR</p>';
  die();
}
$row=mysqli_fetch_array($n_res);
?>
<div class="row">
                            <div class="col-lg-4">
                              <div class="card mb-4">
                                <div class="card-body text-center">
                                  <img src="../img/<?php echo $row['photo']; ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                  <h5 class="my-3"><?php echo $row['name']; ?></h5>
                                  <p class="text-muted mb-1"><?php echo $str; ?></p>
                                  <p class="text-muted mb-4"><i class="fa-solid fa-location-dot"></i> <?php echo $row['address']; ?></p>
                                  
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
                                      <p class="mb-0">Teacher ID</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['id']; ?></p>
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
                                      <p class="mb-0">Aadhar Number</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0"><?php echo $row['aadhar']; ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>