<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Log In/Sign Up</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css" />

  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!-- partial:index.partial.html -->
  <a href="https://front.codes/" class="logo" target="_blank">
    <img src="plugins/images/icon.png" alt="" />
  </a>


  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3">
              <span>Log In </span><span>Sign Up</span>
            </h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In</h4>
                      <div class="form-group">
                        <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail"
                          autocomplete="off" />
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Your Password"
                          id="logpass" autocomplete="off" />
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <button name="btn_login" class="btn mt-4">Submit</button>
                      <p class="mb-0 mt-4 text-center">
                        <a href="#0" class="link">Forgot your password?</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <!-- <h4 class="mb-4 pb-3">Sign Up</h4> -->
                      <form action="" method="post">
                        <h3>Register</h3>
                        <div class="form-group">
                          <select name="department" id="logname" autocomplete="off" class="form-style">
                            <option value="dept">Choose your department</option>
                            <option value="mca">MCA</option>
                            <option value="mba">MBA</option>
                          </select>

                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="text" name="name" class="form-style" placeholder="Your Full Name" id="logname"
                            autocomplete="off" required/>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail"
                            autocomplete="off" required/>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="password" class="form-style" placeholder="Your Password"
                            id="logpass" autocomplete="off" required/>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="cpassword" class="form-style" placeholder="Confirm Your Password"
                            id="logpass" autocomplete="off" required/>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" name="submit" class="btn mt-4">Register</button>
                        <!-- <a href="#" class="btn mt-4">Register</a> -->
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src="js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<?php
include('config.php');
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$dept = mysqli_real_escape_string($conn,$_POST['department']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
$sql = mysqli_query($conn,"SELECT * FROM user_form where email='$email'");
if(mysqli_num_rows(mysqli_query($conn,"select * from user_form where email='$email'"))>0)
{
  echo '
  <script>
  swal("User Already Exists","",
                 "warning", {
                dangerMode: true,
                buttons: true,
                closeOnClickOutside: false,
                timer: 5000,
            });
  </script>
  ';
}
else if($pass != $cpass){
  echo '
  <script>
  swal("Passwords do not match","",
  "warning", {
 dangerMode: true,
 buttons: true,
 closeOnClickOutside: false,
 timer: 5000,
});
  </script>
  ';
}
else{
  $pass = password_hash($pass, PASSWORD_DEFAULT);
  $sql1 = mysqli_query($conn,"INSERT into user_form(`name`,`email`,`dept_name`,'password')VALUES('$name','$email','$dept','$pass')");
  if($sql1){
    echo'
    <script>
    alert("User created successfully");
      </script>
    ';
  }
}
}
if(isset($_POST['btn_login'])){
  $email = mysqli_real_escape_string($conn,$_POST['logemail']);
  $password = mysqli_real_escape_string($conn,$_POST['logpass']);
  $sql = mysqli_query($con,"select * from `user_form` WHERE email='$stud_email'");
  if(mysqli_num_rows($sql)>0)
  {
	$row = mysqli_fetch_assoc($sql);
	$verify = password_verify($password,$row['password']);
  if($verify){
		$_SESSION['logged_user'] = $row['id'];
		header("location:admin/index.php?loggedin");
  }
}
}
?>
</body>
</html>