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
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .actions a:hover{
            color: white;
        }

        .alert-dismissible .btn-close {
           padding: 0.3em;
        }
    </style>
    
</head>
<body>
    <div class="banner">

        <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
        </nav>
        
        
        <div class="content">

        <?php if (isset($_SESSION['message'])){ ?>
        <div class="alertBox">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 70%; text-align:center; display:inline-block;">
            <strong> <?php echo $_SESSION['message']; ?> </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php unset($_SESSION['message']); ?>
        </div>
        <?php } else { ?>
            <br><br><br><br><br>
        <?php } ?>
    
            <div class="title"> 
                <h1> <?= $_SESSION['employeename'] . " : " . ucwords($_SESSION['role']) ?> </h1>  <br>
            </div>
            <div class="actions">
                <ul>
                    <?php if ($_SESSION['role'] === 'customercareofficer') { ?>
                    <li><a href="<?= SROOT ?>CustomerSearch/searchcustomer">Reserve for Customers</a></li>
                    <li><a href="<?= SROOT ?>ReservationHandler/roomrequest">Room Reservation Management</a></li><br>
                    <li><a href="<?= SROOT ?>ReservationHandler/buffetrequest">Buffet Reservation Management</a></li>
                    <li><a href="<?= SROOT ?>CustomerRequestHandler/assignRequest">Manage Customer Requests</a></li>
                    <?php } elseif ($_SESSION['role'] === 'manager') { ?>
                    <li><a href="<?= SROOT ?>ReservationHandler/monitorroom">Monitor Room status</a></li>
                    <li><a href="<?= SROOT ?>EmployeeRegister/addemployee">Add/Remove Employee</a></li>
                    <li><a href="<?= SROOT ?>HotelReview">View Customer Ratings</a></li>
                    <li><a href="<?= SROOT ?>RoomStatus/addroom">Add a new Room</a></li>
                    <?php } else { ?>
                    <li><a href="<?= SROOT ?>CustomerRequestHandler/showRequest"> Assigned Customer Requests</a></li> <br>
                    <li><a href="<?= SROOT ?>RoomStatus/service">Update Room Service</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>