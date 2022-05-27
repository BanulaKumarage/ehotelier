<?php 
    $customer = Customer::currentLoggedInCustomer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation</title>
</head>
<body>
    <div>
        <h1>Room Reservation</h1> <br>
        <div>
            <form action="<?=SROOT?>ReservationHandler/roomreservation" method="post">
                <label>Customer Name : </label> 
                <input type="text" name="customer-name" value = "<?= $customer->name ?>" readonly> <br> <br>
                <label>Contact No. : </label> 
                <input type="text" name="mobile-number" value = "<?= $customer->contact_no ?>" readonly> <br> <br>
                <label>No of people : </label> 
                <input type="text" name="occupancy" value = "<?php echo htmlspecialchars($_POST['occupancy'] ?? '', ENT_QUOTES); ?>" required> <br> <br>
                <label>Check in : </label> 
                <input type="date" name="check_in_date" value = "<?php echo htmlspecialchars($_POST['check_in_date'] ?? '', ENT_QUOTES); ?>" required> <br> <br>
                <label>Check out : </label> 
                <input type="date" name="check_out_date" value = "<?php echo htmlspecialchars($_POST['check_out_date'] ?? '', ENT_QUOTES); ?>" required> <br> <br>

                <label>Accomodation Type</label>
                <select name = "type">
                    <option value="fullboard">Full Board </option>
                    <option value="halfboard">Half Board </option>
                    <option value="bedandbreakfast">Bed and Breakfast </option>
                </select><br><br>
                <input type="submit" value="Avilable Options">

            </form>

            <span>
                <?php echo $this->displayErrors ?? ""; ?>
            </span>
        </div>

    </div>
</body>
</html>