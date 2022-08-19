<?php include('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center {
        height: 500px;
        border: 3px solid green;
        padding-bottom:10% 10%;
        }
        .tbl-full
        {
            width: 100%;
        }
        .tbl-40
        {
            width: 40%;
        }
        table tr th
        {
            border-bottom: 1px solid black;
            padding: 1%;
            text-align: left;
        }

        table tr td
        {
            padding: 3%;
        }
        .btn-secondary
        {
            background-color: #7bed9f;
            padding: 1%;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-secondary:hover
        {
            background-color: #3742fa;
        }
    </style>
</head>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_book WHERE id = $id";
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $cusname = $row['cusname'];
        $mobile = $row['mobile'];
        $model = $row['modelname'];
        $conform = $row['conformation'];
    }
?>
<body>
    <div class="center">
        <h1><u>BOOKING CONFORMATION</u></h1>
        <button style="float:right;"><a style="text-decoration:none;" href="../admin/status_check.php">Go Back</a></button>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-40" >
                <tr>
                    <td>cusname:</td>
                    <td>
                        <input type="text" name = "cusname" value="<?php echo $cusname; ?>" placeholder="enter the cusname" required>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>Mobile No:</td>
                    <td>
                        <input type="number" name = "mobile" value="<?php echo $mobile; ?>" placeholder="enter mobile number" required>
                    </td>
                </tr>

                <tr>
                    <td>Model_name:</td>
                    <td>
                        <input type="text" name = "model" value="<?php echo $model; ?>" placeholder="enter the cusname" required>
                    </td>
                </tr>

                <tr>
                    <td>CONFORMATION:</td><br>
                    <td>
                        <select name="confirm" id=""  required>
                            <option <?php if($conform==null){echo "selected";} ?> value="PENDING">PENDING</option>
                            <option <?php if($conform=="APPROVED"){echo "selected";} ?> value="APPROVED">APPROVE</option>
                            <option <?php if($conform=="CANCLED"){echo "selected";} ?> value="CANCELED">CANCEL</option>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td>Delivery Date:</td>
                    <td>
                        <input type="date" name="ddate">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="SUBMIT" class="btn-secondary">
                    </td>

                </tr>
            </table>
        </form>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            
            $id = $_GET['id'];
            $cusname = $_POST['cusname'];
            $mobile = $_POST['mobile'];
            $model = $_POST['model'];
            $conform = $_POST['confirm'];
            $d_date = $_POST['ddate'];

            $sql2 = "UPDATE tbl_book SET
            cusname = '$cusname',
            mobile = '$mobile',
            modelname = '$model',
            conformation = '$conform',
            delivery_date = '$d_date'
            WHERE id=$id
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2 == TRUE)
            {
                $_SESSION['confirm'] = "<div style = 'color:green;'>Order Confirm Successfully.</div>";
                header("location:".SITEURL.'admin/status_check.php');
            }
            else
            {
                $_SESSION['confirm'] = "<div style = 'color:red;'>Order failed.</div>";
                header("location:".SITEURL.'admin/status_check.php');
            }
        }  
    ?>
</body>
</html>