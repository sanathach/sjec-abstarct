<?php
  ob_start();
  ob_clean();
  session_start();

  if(isset($_SESSION['logged_user']))
  {
    include("inc/config.php");
    $admin_id =$_SESSION['logged_user'];
    $sql=mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_id = '$admin_id'") or die(mysqli_error($conn));
    $r = mysqli_fetch_array($sql);
    $admin_name = $r['name'];
    $admin_email = $r['email'];
  }
  else
  {
    header("location:index.php");
  }
  ?>