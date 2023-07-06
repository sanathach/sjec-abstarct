<?php 
include('inc/session.php');
if(isset($_GET['delete'])){
    include('inc/config.php');
    $dept_id = $_GET['dept_id'];
    $sql = mysqli_query($conn,"DELETE FROM department WHERE dept_id='$dept_id'");
    if($sql)
    {
        echo '
    <script>
    alert("Department Deleted successfully");
    window.location.href = "view-dept.php";
    </script>
    ';
    }
}
?>