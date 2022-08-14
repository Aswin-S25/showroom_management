<?php include('/xampp/htdocs/showroom_management/config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
        text-align: left;
        position: relative;
        border-collapse: collapse; 
        background-color: #f6f6f6;
        }/* Spacing */
        td, th {
        border: 1px solid #999;
        padding: 20px;
        }
        th {
        background: brown;
        color: white;
        border-radius: 0;
        position: sticky;
        top: 0;
        padding: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;"><u>STOCK DETAILS</u></h1>
    <button style="float:right;"><a style="text-decoration:none;" href="../adactivities.php">Go Back</a></button>
    <br><br><br><br>
    
    <?php
      if(isset($_SESSION['delete']))
      {
          echo($_SESSION['delete']);
          unset($_SESSION['delete']);
      }
    ?>
    <br><br>
    <table style="width: 100%;">                                                          
    <tr>
          <th scope="col">id</th>
          <th scope="col">Model Name</th>
          <th scope="col">Max Speed</th>
          <th scope="col">Type of Wheel</th>
          <th scope="col">Power</th>
          <th scope="col">Price</th>
          <th scope="col">Color</th>
          <th scope="col">Stock NO</th>
          <th scope="col">Action</th>
        </tr>
        
        <?php 
        
          $sql = "SELECT * FROM tbl_stock";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);
          $sn=1;
          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $model = $row['modelname'];
                $speed = $row['topspeed'];
                $wheel = $row['wheel'];
                $power = $row['power'];
                $price = $row['price'];
                $color = $row['color'];
                $stock_no = $row['stock_no'];
                ?>

                <tr>
                  <td><?php echo $sn++ ;?></td>
                  <td><?php echo $model;?></td>
                  <td><?php echo $speed; ?></td>
                  <td><?php echo $wheel;?></td>
                  <td><?php echo $power; ?></td>
                  <td><?php echo $price?></td>
                  <td><?php echo $color?></td>
                  <td><?php echo $stock_no?></td>
                  <td><button style="background-color: #F32013;"><a style="text-decoration: none; color:#f6f6f6;"  href="delete_stock.php?id=<?php echo $id; ?>">Delete</a></button></td>
                </tr>

                <?php 
            }

          }
        ?>
      </table>
      
</body>
</html>