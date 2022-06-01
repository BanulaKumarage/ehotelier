<?php 
     if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Employee Dashboard </title>
    <link rel="stylesheet" href="<?=SROOT?>css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
</head>
<body>
    <div class="banner">
        <div>
            <strong><?php 
                        if (isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        
                    ?>
            </strong>
        </div>

        <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
        </nav>
        
        <div class="content">
            <div class="title"> 
                <h1> <?= $_SESSION['employeename'] . " : " . ucwords($_SESSION['role']) ?> </h1> 
            </div>
            <br> <br>
            <div class="actions">
                <ul>
                    <?php if ($_SESSION['role'] === 'customercareofficer') { ?>
                    <li><a href="<?= SROOT ?>CustomerSearch/searchcustomer">Reserve for Customers</a></li>
                    <li><a href="<?= SROOT ?>ReservationHandler/roomrequest">Room Reservation Management</a></li>
                    <li><a href="<?= SROOT ?>ReservationHandler/buffetrequest">Buffet Reservation Management</a></li>
                    <li><a href="<?= SROOT ?>CustomerRequestHandler/assignRequest">Manage Customer Requests</a></li>
                    <?php } elseif ($_SESSION['role'] === 'manager') { ?>
                    <li><a href="<?= SROOT ?>ReservationHandler/monitorroom">Monitor Room status</a></li>
                    <li><a href="<?= SROOT ?>EmployeeRegister/addemployee">Add Employee</a></li>
                    <li><a href="<?= SROOT ?>HotelReview">View Customer Ratings</a></li>
                    <?php } else { ?>
                    <li><a href="<?= SROOT ?>CustomerRequestHandler/showRequest">Show assigned Customer Requests</a></li>
                    <li><a href="<?= SROOT ?>RoomStatus/service">Update Room Service</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>