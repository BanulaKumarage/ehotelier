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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Customer Ratings</title>
    <style>
    .checked {
    color: orange;
    }
    </style>
</head>

<body style="background-color: #200300;">

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

    <div class="mt-5">
    <h1 class="title" style="font-family: 'Ubuntu', sans-serif;"> eHotelier Ratings </h1> 
    <?php if (!$this->ratings){
        $this->ratings = [];
    }?>

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

        <br> <br>

        <h2 class="title" style="font-family: 'Ubuntu', sans-serif;"> Ratings Summary </h2>

        <div class="summary text-white rating-bar0">
        <p><h1><?php echo (float) number_format($overall,1)?> / 5</h1> from <?php echo count($this->ratings)?> customer
        <?php if (count($this->ratings) == 1) { echo 'rating'; } else { echo 'ratings'; }?> </p>

        <table>
            <tr>
                <td> 5 stars </td>
                <td class="rating-bar">
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo 100 * $count[5] / count($this->ratings) ?>%;"></div>
                    </div>
                </td>
                <td><?php echo $count[5]?></td>
            </tr>
            <tr>
                <td> 4 stars </td>
                <td class="rating-bar">
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo 100 * $count[4] / count($this->ratings) ?>%;"></div>
                    </div>
                </td>
                <td><?php echo $count[4]?></td>
            </tr>
            <tr>
                <td> 3 stars </td>
                <td class="rating-bar">
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo 100 * $count[3] / count($this->ratings) ?>%;"></div>
                    </div>
                </td>
                <td><?php echo $count[3]?></td>
            </tr>
            <tr>
                <td> 2 stars </td>
                <td class="rating-bar">
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo 100 * $count[2] / count($this->ratings) ?>%;"></div>
                    </div>
                </td>
                <td><?php echo $count[2]?></td>
            </tr>
            <tr>
                <td> 1 star </td>  
                <td class="rating-bar">
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo 100 * $count[1] / count($this->ratings) ?>%;"></div>
                    </div>
                </td>
                <td><?php echo $count[1]?></td>
            </tr>
        </table>

        </div>

        <br> <br>

        <h2 class="title" style="font-family: 'Ubuntu', sans-serif;"> Customer Ratings </h2>

        <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16">
  
                <?php
                    foreach (array_reverse($this->ratings) as $rating) {
                        $r = (array) $rating;
                        ?>

                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-container w3-white pt-2">
                                <span class="fa fa-star checked"></span>  
                                <span class="fa fa-star <?php if ($r['value'] > 1) { echo "checked"; } else { echo "unchecked"; } ?>"></span>  
                                <span class="fa fa-star <?php if ($r['value'] > 2) { echo "checked"; } else { echo "unchecked"; } ?>"></span>  
                                <span class="fa fa-star <?php if ($r['value'] > 3) { echo "checked"; } else { echo "unchecked"; } ?>"></span>  
                                <span class="fa fa-star <?php if ($r['value'] > 4) { echo "checked"; } else { echo "unchecked"; } ?>"></span>
                                <p> Review : <?php echo $r['description'];?> </p>
                            </div>
                        </div>

                <?php } ?>
   
        </div>
        </div>

    <?php } else { ?>
    <h2 style="font-family: 'Ubuntu', sans-serif; margin-left:20px; color:white">No Ratings Available</h2>
    <?php }?>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>