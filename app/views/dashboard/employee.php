<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
</head>
<body>
<h1><?= $_SESSION['employeename'] . " : " . ucwords($_SESSION['role']) ?></h1>

<!--    =======================-->

<div>
    <?php if ($_SESSION['role'] === 'customercareofficer') { ?>

        <br> <br>
        <a href="<?= SROOT ?>CustomerSearch/searchcustomer">Reserve for Customers</a>
        <br>
        <a href="<?= SROOT ?>ReservationHandler/roomrequest">Room Reservation Management</a>
        <br>
        <a href="<?= SROOT ?>ReservationHandler/buffetrequest">Buffet Reservation Management</a>
        <br><br>
        <a href="<?= SROOT ?>CustomerRequestHandler/showRequest">Customer Requests</a>
        <br><br>
        <a href="<?= SROOT ?>CustomerRequestHandler/assignRequest">Manage Customer Requests</a>


    <?php } elseif ($_SESSION['role'] === 'manager') { ?>
        <br><br>
        <a href="<?= SROOT ?>ReservationHandler/monitorroom">Monitor Room status</a>
        <br><br>
        <a href="<?= SROOT ?>Employeeregister/addemployee">Add Employee</a>

    <?php } else { ?>
        <br><br>
        <a href="<?= SROOT ?>CustomerRequestHandler/showRequest">Show assigned Customer Requests</a>
        <br><br>
        <a href="<?= SROOT ?>RoomStatus/service">Update Room Service</a>
    <?php } ?>
</div>

<br><br>
<a href="<?= SROOT ?>EmployeeRegister/logout">Logout</a>

</body>
</html>