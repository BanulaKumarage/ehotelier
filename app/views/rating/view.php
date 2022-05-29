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
    <title>Customer Ratings</title>
</head>

<body>
    <h1>Customer Ratings</h1> <br>

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

        <p><?php echo (float) number_format($overall,2)?> out of <?php echo count($this->ratings)?> customer ratings </p>

        <table>
            <tr>
                <td>1 star: </td><td><?php echo $count[1]?></td>
            </tr>
            <tr>
                <td>2 star: </td><td><?php echo $count[2]?></td>
            </tr>
            <tr>
                <td>3 star:</td><td><?php echo $count[3]?></td>
            </tr>
            <tr>
                <td>4 star: </td><td><?php echo $count[4]?></td>
            </tr>
            <tr>
                <td>5 star: </td><td><?php echo $count[5]?></td>
            </tr>
        </table>

        <br>

        <div>
            <table>
                <?php
                    foreach ($this->ratings as $rating) {
                        $rating = (array) $rating;
                        ?>
                        <tr>
                        <td>
                            <?php echo $rating['value'];?>
                        </td>
                        <td>
                            <?php echo $rating['description'];?>
                        </td>
                        </tr>
                    <?php }
                ?>
            </table>
        </div>


    <?php } ?>

</body>

</html>