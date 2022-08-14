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
        height: 700px;
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
<body>
    <div class="center">
        <h1><u>STOCK DETAILS ENTERING</u></h1>
        <button style="float:right;"><a style="text-decoration:none;" href="../adactivities.php">Go Back</a></button>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-40" >
                <tr>
                    <td>Model Name:</td>
                    <td>
                        <input type="text" name = "Model" placeholder="enter the model name" required>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>Mileage:</td>
                    <td>
                        <input type="number" name = "Mileage" placeholder="enter Mileage" required>
                    </td>
                </tr>

                <tr>
                    <td>Max Speed:</td>
                    <td>
                        <input type="number" name = "Speed" placeholder="Speed in Km/Hr" required>
                    </td>
                </tr>

                <tr>
                    <td>Type Of Wheels  :</td><br>
                    <td>
                        <input type="text" name="Wheel" placeholder="Wheels" required>
                    </td>
                </tr>

                <tr>
                    <td>Power:</td><br>
                    <td>
                        <input type="text" name="Power" placeholder="In HP" required>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td><br>
                    <td>
                        <input type="text" name="Price" placeholder="$" required>
                    </td>
                </tr>

                <tr>
                    <td>Color: </td><br>
                    <td>
                        <input type="text" name="Color" placeholder="color" required>
                    </td>
                </tr>

                <tr>
                    <td>Stock number: </td><br>
                    <td>
                        <input type="number" name="stock_no" placeholder="Stock number" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="ADD" class="btn-secondary">
                    </td>

                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset($_POST['submit']))
        {
            //echo "hello";
            $model = $_POST['Model'];
            $mileage = $_POST['Mileage'];
            $speed = $_POST['Speed'];
            $wheel = $_POST['Wheel'];
            $power = $_POST['Power'];
            $price = $_POST['Price'];
            $color = $_POST['Color'];
            $stock_no = $_POST['stock_no'];

            $sql = "INSERT INTO tbl_stock SET
            modelname = '$model',
            mileage = '$mileage',
            topspeed = '$speed',
            wheel = '$wheel',
            power = '$power',
            price = '$price',
            color = '$color',
            stock_no = '$stock_no'
            ";

            $res = mysqli_query($conn, $sql);

            if($res == TRUE)
            {
                $_SESSION['add'] = "<div style = 'color:green;'>Stock Added successfully</div>";
                header("location:".SITEURL.'adactivities.php');
            }
            else
            {
                $_SESSION['add'] = "<div style = 'color:red;'> Failed to Added Stock</div>";
                header("location:".SITEURL.'admin/stock_details.php');
            }
        }
    ?>
</body>
</html>