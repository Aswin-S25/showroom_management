 <?php
    include('../config/config.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_stock WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
        $_SESSION['delete'] = "<div style='color:green'>Stock Deleted Succcessfully</div>";
        header("location:".SITEURL.'admin/stock_show.php');
    }
    else
    {
        $_SESSION['delete'] = "<div style='color:red'>Failed to  Deleted Stock </div>";
        header("location:".SITEURL.'admin/stock_show.php');
    }


 ?>