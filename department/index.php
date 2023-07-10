<?php
  ob_start();
  ob_clean();
  session_start();
   if(isset($_SESSION['logged_user']))
  {
	$_SESSION = array();
	session_unset($_SESSION['logged_user']);
	header("location:index.php");
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php include('inc/head.php'); ?>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="email" name="logemail" class="form-control form-control-lg" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" name="logpass" class="form-control form-control-lg"  placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button name="btn_login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php include('inc/script.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <?php
if(isset($_POST['btn_login'])){
    include('inc/config.php');
  $email = mysqli_real_escape_string($conn,$_POST['logemail']);
  $password = mysqli_real_escape_string($conn,$_POST['logpass']);
  $sql = mysqli_query($conn,"select * from `department` WHERE email='$email'");
  if(mysqli_num_rows($sql)>0)
  {
	$row = mysqli_fetch_assoc($sql);
	$verify = password_verify($password,$row['password']);
  if($verify){
		$_SESSION['logged_user'] = $row['dept_id'];
		header("location:home.php");
  }
else {
    echo '
    <script>
    swal("Incorrect Email or Password","",
    "warning", {
   dangerMode: true,
   buttons: true,
   closeOnClickOutside: false,
   timer: 5000,
  });
    </script>
    ';
}  
}
}
?>
</body>

</html>
