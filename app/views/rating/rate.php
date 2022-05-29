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
    <title>Hotel Rating</title>
</head>

<body>
    <h1>Rate ehotelier</h1> <br>

    <?php 
    $rated = false;
    foreach ($this->ratings as $rating) {
        $r = (array) $rating;
        if (isset($r['customer_id']) && $r['customer_id'] == $customer->id) {
            $rated = true;
            break;
        }
    }
    if ($rated) {
        echo 'You gave ';
        echo $r['value'] . ' stars. <br> Your review: ' . $r['description'];
    } else {
    ?>
    <div>
        <form action="<?=SROOT?>HotelReview/rate" method="post">
        
        <label for="value">1</label>
        <input type="radio" id="1" name="value" value="1">
        <label for="value">2</label>
        <input type="radio" id="2" name="value" value="2">
        <label for="value">3</label>
        <input type="radio" id="3" name="value" value="3">
        <label for="value">4</label>
        <input type="radio" id="4" name="value" value="4">
        <label for="value">5</label>
        <input type="radio" id="5" name="value" value="5">
        <br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea>
        <input type="submit" value="Publish">
        </form>

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
                        $r = (array) $rating;
                        ?>
                        <tr>
                        <td>
                            <?php echo $r['value'];?>
                        </td>
                        <td>
                            <?php echo $r['description'];?>
                        </td>
                        </tr>
                    <?php }
                ?>
            </table>
        </div>


    <?php } ?>

</body>

</html>