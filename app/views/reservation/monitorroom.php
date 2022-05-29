<?php 
    if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
        
    }elseif ($_SESSION['role'] !== 'manager'){
        Router::redirect('EmployeeDashboard');
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=SROOT?>css/monitorroom.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Monitor Room Status </title>
</head>

<body>

    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>CustomerRegister/logout"> Logout </a></li>
        </ul>
    </nav>

    <br><br><br>

    <!-- Page content -->

    <h1 class="title"> Room Reservation Details </h1> <br>

    <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16">

        <?php
        foreach ($this->roomDetails as $roomDetail){ ?>
            <div class="w3-third w3-margin-bottom">
              <?php if($roomDetail->{'type'} == "Deluxe") { ?> 
              <img src="<?=SROOT?>images/deluxe.jpg" alt="Deluxe" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Premium Deluxe"){ ?>
              <img src="<?=SROOT?>images/premiumdeluxe.jpg" alt="Premium Deluxe" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Quad"){ ?>
              <img src="<?=SROOT?>images/quad.jpg" alt="Quad" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Single"){ ?>
              <img src="<?=SROOT?>images/single.jpg" alt="Single" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Suite"){ ?>
              <img src="<?=SROOT?>images/suite.jpg" alt="Suite" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Triple"){ ?>
              <img src="<?=SROOT?>images/triple.jpg" alt="Triple" style="width:100%">
              <?php } ?>
              <div class="w3-container w3-white">
                <h3> Room NO: <?php echo $roomDetail->{'id'} ?> </h3>
                <h6 class="w3-opacity"> Capacity : <?php echo $roomDetail->{'capacity'} ?></h6>
                <h6 class="w3-opacity"> Type : <?php echo $roomDetail->{'type'} ?> </h6>
                <h6 class="w3-opacity"> Status : <?php echo $roomDetail->{'status'} ?> </h6>
                <h6 class="w3-opacity"> Last Service : <?php echo $roomDetail->{'last_service'} ?>  </h6>
              </div>
            </div>
        <?php } ?>

        </div>
    </div>


</body>
</html>