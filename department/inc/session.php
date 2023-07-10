<?php
  ob_start();
  ob_clean();
  session_start();

  if(isset($_SESSION['logged_user']))
  {
    include("inc/config.php");
    $dept_id =$_SESSION['logged_user'];
    $sql=mysqli_query($conn, "SELECT * FROM `department` WHERE dept_id = '$dept_id'") or die(mysqli_error($conn));
    $r = mysqli_fetch_array($sql);
    $dept_name = $r['dept_name'];
    $email = $r['email'];
    $dept_acronym = $r['dept_acronym'];
  }
  else
  {
    header("location:index.php");
  }
  ?>