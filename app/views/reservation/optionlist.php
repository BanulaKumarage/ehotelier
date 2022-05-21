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
    <title>Available Options</title>
</head>
<body>
    <table>
        <h3>Available Options</h3>
        <div>
                <label>Check In Date: </label><?= $_SESSION['check_in_date'] ?><br>
                <label>Check Out Date: </label><?= $_SESSION['check_out_date'] ?><br>
                <?= $types[$_SESSION['type']] ?>
        </div> <br>
        <?php for($i = 0; $i < count($this->allrooms) ; $i++) { 
            $options = $this->allrooms[$i]
        ?>
            <div>
                <label>Room Type : <?= $options[0]->type ?></label> <br>
                <label><?= $options[0]->capacity.' x '.count($options)." Rooms" ?> </label>
                <a href="<?=SROOT?>ReservationHandler/reserve/<?= $i ?>">Reserve</a>
            </div><br>

        <?php } ?>
    </table>
    
</body>
</html>