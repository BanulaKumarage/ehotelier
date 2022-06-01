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
    $types = [
        'fullboard'=>"Full Board",
        'halfboard'=>"Half Board",
        'bedandbreakfast'=>"Bed and Breakfast"
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/optionlist.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Available Options </title>
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



    <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16">
        
        <?php if (count($this->allrooms) > 0 ) {?>

        <?php for($i = 0; $i < count($this->allrooms) ; $i++) { 
            $options = $this->allrooms[$i]
            ?>
            <div class="w3-third w3-margin-bottom">
              <?php if($options[0]->type == "Deluxe") { ?> 
              <img src="<?=SROOT?>images/deluxe.jpg" alt="Deluxe" style="width:100%">
              <?php } elseif($options[0]->type == "Premium Deluxe"){ ?>
              <img src="<?=SROOT?>images/premiumdeluxe.jpg" alt="Premium Deluxe" style="width:100%">
              <?php } elseif($options[0]->type == "Quad"){ ?>
              <img src="<?=SROOT?>images/quad.jpg" alt="Quad" style="width:100%">
              <?php } elseif($options[0]->type == "Single"){ ?>
              <img src="<?=SROOT?>images/single.jpg" alt="Single" style="width:100%">
              <?php } elseif($options[0]->type == "Suite"){ ?>
              <img src="<?=SROOT?>images/suite.jpg" alt="Suite" style="width:100%">
              <?php } elseif($options[0]->type == "Triple"){ ?>
              <img src="<?=SROOT?>images/triple.jpg" alt="Triple" style="width:100%">
              <?php } ?>
              <div class="w3-container w3-white">
                <h3> Room Type : <?= $options[0]->type ?> </h3>
                <!--<h6 class="w3-opacity">From $99</h6>-->
                <h6 class="w3-opacity"> Check-in Date : <?= $_SESSION['check_in_date'] ?> </h6>
                <h6 class="w3-opacity"> Check-out Date : <?= $_SESSION['check_out_date'] ?> </h6>
                <h6 class="w3-opacity"> <?= $types[$_SESSION['type']] ?> </h6>
                <h6 class="w3-opacity"> <?= $options[0]->capacity.' x '.count($options)." Rooms" ?>  </h6>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
                <button class="w3-button w3-block w3-black w3-margin-bottom" onclick="location.href='<?=SROOT?>ReservationHandler/reserve/<?= $i ?>'"> Reserve </button>
              </div>
            </div>
        <?php } ?>

        <?php } else { ?>
            <h2>No room options available for your details</h2>
        <?php }?>
        </div>
    </div>


</body>
</html>