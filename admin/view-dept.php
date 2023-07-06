<?php include('inc/session.php'); ?>
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
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Departments</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sl.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include('inc/config.php'); 
                        $i = 1;
                        $sql = mysqli_query($conn,"SELECT * FROM department");
                        while($row = mysqli_fetch_array($sql)){
                            echo '
                            <tr>
                            <td>'.$i++.'</td>
                            <td><p>'.$row['dept_name'].'</p></td>
                            <td><p>'.$row['email'].'</p></td>
                            <td><a href="add-dept.php?edit&&dept_id='.$row['dept_id'].'" style="text-decoration:none;color:white"><button type="button" class="btn btn-primary">Edit</button></a>
                            <a href="delete-dept.php?delete&&dept_id='.$row['dept_id'].'" style="text-decoration:none;color:white"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                            </tr>
                            ';
                        }?>
                      </tbody>
                    </table>
                  </div>
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
?>
</html>

