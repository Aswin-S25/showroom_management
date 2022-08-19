<?php include('../config/config.php') ?>
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
    <h1 style="text-align: center;"><u>STATUS CHECK</u></h1><br><br><br><br>
    <button style="float:right;"><a style="text-decoration:none;" href="user.php">Go Back</a></button>
    <table style="width: 100%;">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">ID</th>
          <th scope="col">CusName</th>
          <th scope="col">Mobile No</th>
          <th scope="col">Model Name</th>
          <th scope="col">Conformation</th>
          <th scope="col">Delivery Date</th>

        </tr>
        <?php 
        $sql = "SELECT * FROM tbl_book ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $sn=1;
        if($count >0)
        {
          while($row = mysqli_fetch_assoc($res))
          {
            $id = $row['id'];
            $booktime = $row['booktime'];
            $cusname = $row['cusname'];
            $mobile = $row['mobile'];
            $model = $row['modelname'];
            $conform = $row['conformation'];
            $ddate = $row['delivery_date'];
          
          ?>
          <tr>
          <td><?php echo $booktime; ?></td>
          <td><?php echo $sn++;?></td>
          <td><?php echo $cusname;?></td>
          <td><?php echo $mobile;?></td>
          <td><?php echo $model;?></td>
          <td>
            <?php
              if($conform == "PENDING")
              {
                echo"<label style = 'color:blue;'>$conform</label>";
              }
              elseif($conform == "CANCELED")
              {
                echo"<label style = 'color:red'>$conform</label>";
              }
              elseif($conform == "APPROVED")
              {
                echo"<label style = 'color:green'>$conform</label>";
              }
             ?>
          </td>
          <td><?php echo $ddate;?></td>
        </tr>
        <?php
        }
      }
        ?>
      </table>
      
</body>
</html>