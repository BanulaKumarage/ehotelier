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
    <link rel="stylesheet" href="<?=SROOT?>css/rate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Hotel Rating</title>
</head>

<body>

    <!-- navbar -->
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>CustomerRegister/logout" style="font-family: 'Ubuntu', sans-serif;"> Logout </a></li>
        </ul>
    </nav>

    <br><br><br>

    <h1 class="title" style="font-family: 'Ubuntu', sans-serif;"> Rate eHotelier </h1> 

    <?php 
    $rated = false;
    foreach ($this->ratings as $rating) {
        $r = (array) $rating;
        if (isset($r['customer_id']) && $r['customer_id'] == $customer->id) {
            $rated = true;
            break;
        }
    }
    if ($rated) { ?>
        <div class="container">
            <div class="form">
                <div class="formGroup" style="text-align:center; font-size:17px;">
                <?php echo 'You gave ';
                echo $r['value'] . ' stars. <br> Your review : ' . $r['description']; ?>
                </div>
            </div>
        </div>
    <?php } else {
    ?>

    <div class="container">
        <div class="form">
        
        <form action="<?=SROOT?>HotelReview/rate" method="post">
        <div class="formGroup">
        <label> Select rate : </label>
        <label for="value"></label>
        <input type="radio" id="1" name="value" value="1"> 
        <label for="value"></label>
        <input type="radio" id="2" name="value" value="2"> 
        <label for="value"></label>
        <input type="radio" id="3" name="value" value="3"> 
        <label for="value"></label>
        <input type="radio" id="4" name="value" value="4">
        <label for="value"></label>
        <input type="radio" id="5" name="value" value="5">
        </div>
        <div class="textarea">
        <textarea id="description" name="description" rows="4" cols="50" placeholder="Describe your experience.."></textarea>
        </div>
        <br>
        <input type="submit" class="submitBtn" value="Publish"> <br>
        </form> 

        </div>
    </div>

    <?php
    }
    ?>

    <?php if ($this->ratings && count($this->ratings)){ ?>
        <?php

        $count = array(1=>0,2=>0,3=>0,4=>0,5=>0);
 
        foreach($this->ratings as $rating)
        {
            $r = (array) $rating;
            @$count[$r['value']]++;
        }

            $overall = (1 * $count[1] + 2 * $count[2] + 3 * $count[3] + 4 * $count[4] + 5 * $count[5])/count($this->ratings);
        ?>

        <br> <br> <br>

        <h2 class="title" style="font-family: 'Ubuntu', sans-serif;"> Rate Summary </h2>

        <div class="summary">
        <p><?php echo (float) number_format($overall,2)?> stars out of <?php echo count($this->ratings)?> customer ratings </p>

        <table>
            <tr>
                <td>1 star : </td><td><?php echo $count[1]?> ratings </td>
            </tr>
            <tr>
                <td>2 stars : </td><td><?php echo $count[2]?> ratings </td>
            </tr>
            <tr>
                <td>3 stars :</td><td><?php echo $count[3]?> ratings </td>
            </tr>
            <tr>
                <td>4 stars : </td><td><?php echo $count[4]?> ratings </td>
            </tr>
            <tr>
                <td>5 stars : </td><td><?php echo $count[5]?> ratings </td>
            </tr>
        </table>

        </div>

        <br> <br>

        <h2 class="title" style="font-family: 'Ubuntu', sans-serif;"> Reviews </h2>

        <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16"  id="reservations">
  
                <?php
                    foreach ($this->ratings as $rating) {
                        $r = (array) $rating;
                        ?>

                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-container w3-white">
                                <?php if($r['value']==1){ ?>
                                    <p> Rate : <?php echo $r['value'];?> star </p>
                                <?php } else { ?>
                                    <p> Rate : <?php echo $r['value'];?> stars </p>
                                <?php } ?>
                                <p> Review : <?php echo $r['description'];?> </p>
                            </div>
                        </div>

                <?php } ?>
   
        </div>
        </div>


    <?php } ?>

</body>

</html>