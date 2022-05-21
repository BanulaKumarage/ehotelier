<?php
$customer = Customer::currentLoggedInCustomer();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffet Reservation</title>
</head>

<body>
    <h1>Buffet Reservation</h1> <br>

    <div>
        <form action="<?= SROOT ?>ReservationHandler/buffetreservation" method="post">
            <label>Customer Name : </label>
            <input type="text" name="customer-name" value="<?= $customer->name ?>" readonly> <br> <br>
            <label>Contact No. : </label>
            <input type="text" name="mobile-number" value="<?= $customer->contact_no ?>" readonly> <br> <br>
            <label>No of people : </label>
            <input type="text" name="capacity" value="<?php echo htmlspecialchars($_POST['capacity'] ?? '', ENT_QUOTES); ?>" required> <br> <br>
            <label>Date : </label>
            <input type="date" name="date" value="<?php echo htmlspecialchars($_POST['date'] ?? '', ENT_QUOTES); ?>" required> <br> <br>

            <label>Slot</label>
            <select name="slot">
                <option value="breakfast">Breakfast </option>
                <option value="lunch">Lunch </option>
                <option value="dinner">Dinner</option>
            </select><br><br>
            <input type="submit" value="Reserve Buffet">

        </form>

        <span>
            <?php echo $this->displayErrors ?? ""; ?>
        </span>
</body>

</html>