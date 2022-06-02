<?php 
    if (!isset($_SESSION['customername']) && !isset($_SESSION['employeename'])){
        Router::redirect('');
    }
?>

<?php
if (isset($_SESSION['role'])){
    $customer = new Customer();
    $customer->findById($_SESSION['customer_id']);
}else {
    $customer = Customer::currentLoggedInCustomer();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
  <link rel="stylesheet" href="<?=SROOT?>css/room.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
 
  <!-- jQuery CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title> Room Reservation </title>
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
        <br> <br> <br> <br>
  <div class="container">
    <div class="form">
        <h1> Room Reservation </h1>
        <form class="room" action="<?=SROOT?>ReservationHandler/roomreservation" method="post">
        <div class="formGroup">
            <input type="text" name="customer-name" value="<?= $customer->name ?>" placeholder="Customer Name" readonly>
        </div>
        <div class="formGroup">
            <input type="text" name="mobile-number" placeholder="Contact Number" value="<?= $customer->contact_no ?>" readonly>
        </div>
        <div class="formGroup">
            <input type="text" name="occupancy" value="<?php echo htmlspecialchars($_POST['occupancy'] ?? '', ENT_QUOTES); ?>" placeholder="No of people" required>
        </div>
        <div class="formGroup">
            <input type="date" name="check_in_date" value="<?php echo htmlspecialchars($_POST['check_in_date'] ?? '', ENT_QUOTES); ?>" placeholder="Check-in date" required>
        </div>
        <div class="formGroup">
            <input type="date" name="check_out_date" value = "<?php echo htmlspecialchars($_POST['check_out_date'] ?? '', ENT_QUOTES); ?>" placeholder="Check-out date" required>
        </div>
        <div class="formGroup">
            <select class="form-select" name = "type">
                <option value="fullboard">Full Board </option>
                <option value="halfboard">Half Board </option>
                <option value="bedandbreakfast">Bed and Breakfast </option>
            </select>
        </div>
        <br>
        <input type="submit" class="submitBtn" value="View Available Options">
        </form>
    </div>
  </div>

  <span class="errors">
    <?php echo $this->displayErrors ?? ""; ?>
  </span>

  </div>
 
</body>
 
</html>