<?php include('../config/config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center {
        height: 600px;
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
        <h1><u>BOOK A TABLE</u></h1>
        <button style="float:right;"><a style="text-decoration:none;" href="user.php">Go Back</a></button>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-40" >
                <tr>
                    <td>cusname:</td>
                    <td>
                        <input type="text" name = "cusname" placeholder="enter the cusname" required>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>Mobile No:</td>
                    <td>
                        <input type="number" name = "mobile" placeholder="enter mobile number" required>
                    </td>
                </tr>
                <?php
                    $sql1 = "SELECT modelname FROM tbl_stock WHERE stock_no > 0";
                    $res1 = mysqli_query($conn, $sql1);
                    $count1 = mysqli_num_rows($res1);
                ?>
                <tr>
                    <td>Model_name:</td>
                    <td>
                        <select name="model"  required>
                            <?php
                                if($count1 > 0)
                                {
                                    while($row1 = mysqli_fetch_assoc($res1))
                                    {
                                        echo $modelname = $row1['modelname'];
                                        ?>
                                        <option value="<?php echo $modelname; ?>"><?php echo $modelname ?></option>
                                        <?php
                                    }
                                }
                                    
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <textarea name="address" id="" cols="15" rows="5"></textarea required>
                    </td>
                </tr>
                <tr>
                    <td>Paymen_Mode:</td><br>
                    <td>
                        <select name="payment" id=""  required>
                            <option value="FULL PAYMENT">Full payment</option>
                            <option value="EMI">EMI</option>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="BOOK" class="btn-secondary">
                    </td>

                </tr>
            </table>
        </form>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            $cusname = $_POST['cusname'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $model = $_POST['model'];
            $payment = $_POST['payment'];

            $sql = "INSERT INTO tbl_book SET
            cusname = '$cusname',
            mobile = '$mobile',
            address = '$address',
            modelname = '$model',
            payment = '$payment',
            conformation = 'PENDING'
            ";
            $sql2 = "UPDATE tbl_stock
             SET stock_no = stock_no -1
             WHERE modelname = '$model' AND stock_no > 0";

            $res2 = mysqli_query($conn,  $sql2);
            $res = mysqli_query($conn, $sql);
            
            if($res == TRUE && $res2 == TRUE)
            {
                $_SESSION['book'] = "<div style = 'color:green'>Booked Successfully</div>";
                header("location:".SITEURL.'user/user.php');
            }
            else
            {
                $_SESSION['book'] = "<div style='color:red'>Booking Failed</div>";
                header("location:".SITEURL.'user/book_a_bike.php');
            }
        
            
            
        }
    ?>
</body>
</html>