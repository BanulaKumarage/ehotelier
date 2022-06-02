<?php 
    if (!isset($_SESSION['customername'])){
        if (isset($_SESSION['employeename'])){
            Router::redirect('EmployeeDashboard');
        }else {
            Router::redirect('');
        }
        
    }
?>



<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
  <link rel="stylesheet" href="<?=SROOT?>css/create.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
 
  <!-- jQuery CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title> Request </title>
</head>
 
<body>
  <div class="banner">
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
            <li> <a href="<?=SROOT?>CustomerRegister/logout"> Logout </a></li>
        </ul>
        </nav>
        <br> <br> <br>
  <div class="container">
    <div class="form">
        <br> <h1> Customer Request </h1> <br>
        <form class="customerReq" action="<?=SROOT?>CustomerRequestHandler/create" method="post">
        <div class="formGroup">
            <input type="text" name="reservation_id" placeholder="Room Reservation ID" required>
        </div>
        <div class="formGroup">
            <input type="text" name="description" placeholder="Description" required>
        </div>
        <br>
        <input type="submit" class="submitBtn" value="Request">
        </form>
    </div>
  </div>

  <span class="errors">
    <?php echo $this->errors ?? ""; ?>
  </span>

  </div>
 
  <script src="jQuery.js"></script>
</body>
 
</html>