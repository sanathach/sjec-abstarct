<?php
include('inc/config.php');
if(isset($_GET['delete']))
{
    $upload_id = $_GET['upload_id'];
    $sql = mysqli_query($conn,"DELETE FROM upload WHERE upload_id='$upload_id'");
    if($sql)
    {
        echo '
        <script>
        alert("Post Deleted Successfully");
        window.location.href = "all-posts.php";
        </script>
        ';
    }
}
?>