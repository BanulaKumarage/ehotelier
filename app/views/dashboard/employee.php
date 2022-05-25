<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>
<h1><?= $_SESSION['employeename'] . " : " . ucwords($_SESSION['role']) ?></h1>

<br><br>
<a href="<?= SROOT ?>EmployeeRegister/logout">Logout</a>

<!--    =======================-->

<?php if ($_SESSION['role'] === 'customercareofficer') { ?>
        <div>

            <br> <br>
            <a href="<?= SROOT ?>ReservationHandler/roomrequest">Room Reservation Management</a>
            <br>
            <a href="<?= SROOT ?>ReservationHandler/buffetrequest">Buffet Reservation Management</a>

        </div>

<?php } ?>

</body>
</html>