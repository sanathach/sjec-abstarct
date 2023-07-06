<?php include('inc/session.php'); 
include('inc/config.php');
if(isset($_GET['edit'])){
  $dept_id = $_GET['dept_id'];
  $query = mysqli_query($conn,"SELECT * FROM department WHERE dept_id='$dept_id'");
  $row = mysqli_fetch_array($query);
  $name = $row['dept_name'];
  $email = $row['email'];
}
else{
  $name = $email ="";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
<?php include('inc/head.php'); ?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('inc/menu.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     <?php include('inc/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Department</h4>
                  <p class="card-description">
                   Add New Department
                  </p>
                  <form class="forms-sample" method="POST" autocomplete="OFF">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>" Required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" class="form-control"placeholder="Email" value="<?php echo $email; ?>" Required>
                    </div>
                    <?php if(isset($_GET['edit'])){
                      echo '<button type="submit" name="btn_edit" class="btn btn-primary mr-2">Update</button>';
                    }
                    else
                    {
                    echo '<button type="submit" name="btn_submit" class="btn btn-primary mr-2">Submit</button>';
                    }?>
                  </form>
                </div>
              </div>
            </div>
                  <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <!-- End custom js for this page-->
</body>
<?php 
include('inc/config.php');
if(isset($_POST['btn_submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $sql1 = mysqli_query($conn,"SELECT * FROM department");
    while($rr = mysqli_fetch_array($sql1)){
      if($rr['email']==$email){
        echo '
        <script>
        alert("Department Already Exists");
        </script>
        window.location.href = "view-dept.php";
        ';
        exit();
      }
    }
    $password = password_hash('sanath',PASSWORD_DEFAULT);
  $sql = mysqli_query($conn,"INSERT into department(`dept_name`,`email`,`password`)VALUES('$name','$email','$password')");
  if($sql)
  {
    echo '
    <script>
    alert("Department inserted successfully");
    </script>
    window.location.href = "view-dept.php";
    ';
  }
}
if(isset($_POST['btn_edit'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $sql = mysqli_query($conn,"UPDATE department SET dept_name='$name',email='$email' WHERE dept_id='$dept_id'");
  if($sql)
  {
    echo '
    <script>
    alert("Department Updated successfully");
    </script>
    window.location.href = "view-dept.php";
    ';
  }
}
?>
</html>

