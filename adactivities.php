<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button {
          border: none;
          color: white;
          padding: 18px 60px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 2% 45%;
          cursor: pointer;
        }

        .center {
        height: 400px;
        border: 3px solid green;
        padding-bottom: 10%;
        }
        .link
        {
            text-decoration: none;
            color: white;
        }
        .button1 {background-color: #4CAF50;} /* Green */
        .button2 {background-color: #008CBA;}
        .button3 {background-color: #c98816;} /* Blue */
    </style>
</head>



    
    
<body>
    

    <div class="center">
        <h1 style="text-align:center;"><u>Admin Activites</u></h1>
        <button style="float:right;"><a style="text-decoration:none;" href="http://localhost/showroom_management/">Go Back</a></button>
        <br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <button class="button button1"><a class="link" href="admin/stock_details.php">Stock Entering</a></button>
        <br>
        <button class="button button3"><a class="link" href="admin/status_check.php">Status Check</a></button>
        <br>
        <button class="button button2"><a class="link" href="admin/stock_show.php">Stock Details</a></button>       
    </div>    
    
</body>
</html>