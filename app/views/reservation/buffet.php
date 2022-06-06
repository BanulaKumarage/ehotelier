<?php 
    if (!isset($_SESSION['customername'])){
        if (isset($_SESSION['employeename'])){
            Router::redirect('EmployeeDashboard');
        }else {
            Router::redirect('');
        }
        
    }
?>

<?php
$customer = Customer::currentLoggedInCustomer();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
  <link rel="stylesheet" href="<?=SROOT?>css/buffet.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
 
  <!-- jQuery CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title> Buffet Reservation </title>
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
        <h1> Buffet Reservation </h1>
        <form class="buffet" action="<?= SROOT ?>ReservationHandler/buffetreservation" method="post">
        <div class="formGroup">
            <input type="text" name="customer-name" value="<?= $customer->name ?>" placeholder="Customer Name" readonly>
        </div>
        <div class="formGroup">
            <input type="text" name="mobile-number" placeholder="Contact Number" value="<?= $customer->contact_no ?>" readonly>
        </div>
        <div class="formGroup">
            <input type="text" name="capacity" value="<?php echo htmlspecialchars($_POST['capacity'] ?? '', ENT_QUOTES); ?>" placeholder="No of people" required>
        </div>
        <div class="formGroup">
            <input type="text" name="date" value="<?php echo htmlspecialchars($_POST['date'] ?? '', ENT_QUOTES); ?>" 
            onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date" required>
        </div>
        <div class="formGroup">
            <select class="form-select" name='slot'>
                <option value="breakfast">Breakfast </option>
                <option value="lunch">Lunch </option>
                <option value="dinner">Dinner</option>
            </select>
        </div>
        <br>
        <input type="submit" class="submitBtn" value="Reserve Buffet">
        </form>
    </div>
  </div>

  <span class="errors">
    <?php echo $this->displayErrors ?? ""; ?>
  </span>

  </div>
 
</body>
 
</html>