<<<<<<< HEAD
<?php include('inc/session.php'); ?>
=======
<?php include('inc/session.php');
if(isset($_GET['edit']))
{
  $upload_id = $_GET['upload_id'];
  $query = mysqli_query($conn,"SELECT * FRoM upload WHERE upload_id='$upload_id'");
  $rr = mysqli_fetch_array($query);
  $title = $rr['title'];
  $desc = $rr['description'];
}
else{
  $title = $desc = "";
}
?>
>>>>>>> c8f64f6 (chamges)
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
                  <h4 class="card-title">Create Post</h4>
                  <p class="card-description">
                   Add New Post
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="">Title</label>
<<<<<<< HEAD
                      <input type="text" class="form-control" name="title" placeholder="Title" Required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" name="desc" class="form-control"placeholder="Description" Required>
=======
                      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title; ?>"Required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" name="desc" class="form-control"placeholder="Description" value="<?php echo $desc; ?>"Required>
>>>>>>> c8f64f6 (chamges)
                    </div>
                    <div class="form-group">
                      <label for="">Choose Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
<<<<<<< HEAD
                    <button type="submit" name="btn_submit" class="btn btn-primary mr-2">Submit</button>
=======
                    <?php 
                    if(isset($_GET['edit'])){
                      echo '<button type="submit" name="btn_edit" class="btn btn-success mr-2">Edit</button>';
                    }else{
                    echo '<button type="submit" name="btn_submit" class="btn btn-success mr-2">Submit</button>';
                    }
                    ?>
>>>>>>> c8f64f6 (chamges)
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
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);
    date_default_timezone_set("Asia/Kolkata");
$curdate = date("Y-m-d H:i:s");
  $filename = $_FILES['image']['name'];
  $filetmpname = $_FILES['image']['tmp_name'];
<<<<<<< HEAD
  $folder = '../images/uploads/'.$dept_name.'/';
=======
  $folder = '../images/uploads/'.$dept_acronym.'/';
>>>>>>> c8f64f6 (chamges)
  $newfilename = $title.'.jpg';
  move_uploaded_file($filetmpname,$folder.$newfilename);
  $sql = mysqli_query($conn,"INSERT into upload(dept_id,`title`,`description`,`image`,upload_date)VALUES('$dept_id','$title','$desc','$newfilename','$curdate')");
  if($sql)
  {
    echo '
    <script>
    alert("Post inserted successfully");
    </script>
    window.location.href = "all-posts.php";
    ';
  }
}
<<<<<<< HEAD
=======
if(isset($_POST['btn_edit']))
{
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $desc = mysqli_real_escape_string($conn,$_POST['desc']);
  date_default_timezone_set("Asia/Kolkata");
$curdate = date("Y-m-d H:i:s");
$sql = mysqli_query($conn,"UPDATE upload set title='$title',`description`='$desc',upload_date='$curdate' WHERE upload_id='$upload_id'");
if($sql)
{
  echo '
  <script>
  alert("Post Updated Successfully");
  window.location.href = "all-posts.php";
  </script>
  ';
}
}
>>>>>>> c8f64f6 (chamges)
?>
</html>

