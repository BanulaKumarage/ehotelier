<?php 
    if (!isset($_SESSION['employeename'])){
        Router::redirect('');
    }
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
    <title>Customer Ratings</title>
</head>

<body>

    <!-- navbar -->
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
            <li> <a href="<?=SROOT?>EmployeeRegister/logout" style="font-family: 'Ubuntu', sans-serif;"> Logout </a></li>
        </ul>
    </nav>

    <br><br><br>

    <h1 class="title" style="font-family: 'Ubuntu', sans-serif;"> Customer Ratings </h1>  

    <?php if ($this->ratings && count($this->ratings)){ ?>
        <?php

        $count = array(1=>0,2=>0,3=>0,4=>0,5=>0);
 
        foreach($this->ratings as $r)
        {
            $r = (array) $r;
            @$count[$r['value']]++;
        }

            $overall = (1 * $count[1] + 2 * $count[2] + 3 * $count[3] + 4 * $count[4] + 5 * $count[5])/count($this->ratings);
        ?>

        <div class="summary">
        <p><?php echo (float) number_format($overall,2)?> stars out of <?php echo count($this->ratings)?> customer ratings </p>

        <table>
            <tr>
                <td>1 star: </td><td><?php echo $count[1]?> ratings </td>
            </tr>
            <tr>
                <td>2 stars: </td><td><?php echo $count[2]?>ratings</td>
            </tr>
            <tr>
                <td>3 stars:</td><td><?php echo $count[3]?>ratings</td>
            </tr>
            <tr>
                <td>4 stars: </td><td><?php echo $count[4]?>ratings</td>
            </tr>
            <tr>
                <td>5 stars: </td><td><?php echo $count[5]?>ratings</td>
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


    <?php }else{ ?>
        <h2 style="font-family: 'Ubuntu', sans-serif; margin-left:20px; color:white">No Ratings Available</h2>
    <?php }?>      
   
</body>

</html>