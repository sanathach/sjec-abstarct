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
                  <h4 class="card-title">All Posts</h4>
                  <div class="table-responsive">
                    <table class="table table-hover" style="text-align:center">
                      <thead>
                        <tr>
                          <th>Sl.No</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Uploded Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                       $i=1;
                       include('inc/config.php');
                        $sql = mysqli_query($conn,"SELECT * FROM upload WHERE dept_id='$dept_id'");
                        while($row = mysqli_fetch_array($sql)){
                            echo '
                            <tr>
                            <td>'.$i++.'</td>
                            <td><img src="../images/uploads/'.$dept_acronym.'/'.$row['image'].'" style="width:50px;height:50px;"></td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['description'].'</td>
                            <td>'.date("d-m-Y",strtotime($row['upload_date'])).'</td>
                            <td><a href="new-post.php?edit&&upload_id='.$row['upload_id'].'"><button class="btn btn-success" name="edit">Edit</button></a>
                            <a href="delete-post.php?delete&&upload_id='.$row['upload_id'].'"><button class="btn btn-danger" name="delete">Delete</button></a>
                            <form id="rejectForm" method="POST">
                              <input type="hidden" id="upload_id" value="'.$row['upload_id'].'">
                              <button type="submit" class="btn btn-inverse-primary">Change Picture</button>
                              </form></td>
                            </tr>
                            ';
                        }
                       ?>
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
    <script src="js/sweetalert.min.js"></script>
    <script src="js/jquery.avgrund.min.js"></script>
  <script src="js/picture.js"></script>
  <!-- End custom js for this page-->
  <!-- End custom js for this page-->
</body>
<?php 
include('inc/config.php');

?>
</html>

