<?php
session_start();
if(isset($_SESSION['id'])){
  if($_SESSION['status']=='student'){
    header("location:stud_index.php");
  }
  else{
    header("location:./admin/index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SSM</title>
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assetsss/css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="assetsss/images/logo.png" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form action="login_submit.php" method="post">
              <div class="form-group">
                <label for="email">ID</label>
                <input type="text" name="userName" id="email" class="form-control" placeholder="Enter a valid ID" required>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword" required>
              </div>
              <?php if(isset($_GET['err'])){ ?>
                <p class="text-danger m-2">*invalid id or password</p>
                <?php } ?> 
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
            <a href="#!" class="forgot-password-link">Forgot password?</a>
            
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assetsss/images/back.jpeg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
