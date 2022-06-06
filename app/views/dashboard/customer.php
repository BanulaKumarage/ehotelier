<?php 
    if (!isset($_SESSION['customername'])){
        if (isset($_SESSION['employeename'])){
            Router::redirect('EmployeeDashboard');
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
    <title> Customer Dashboard </title>
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/customerDashboard.css">
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
           position: absolute;
            right: 0;
            z-index: 2;
            padding: 1.25rem 1rem;
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
            <li> <a href="<?=SROOT?>CustomerRegister/logout"> Logout </a></li>
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
                <h1>Hello <?= $_SESSION['customername'] ?>!</h1>
            </div>

            <div class="actions">
                <ul>
                    <li><a href="<?=SROOT?>ReservationHandler/roomreservation"> Room Reservation </a></li>
                    <li><a href="<?=SROOT?>ReservationHandler/buffetreservation"> Buffet Reservation </a></li> <br>
                    <li><a href="<?=SROOT?>CustomerRequestHandler/create"> Make a Request </a></li>
                    <li><a href="<?=SROOT?>HotelReview/rate"> Rate the Hotel </a></li> <br>
                    <li><a href="<?=SROOT?>ReservationHandler/buffetreservationhistory"> Buffet Reservation History </a></li>
                    <li><a href="<?=SROOT?>ReservationHandler/roomreservationhistory"> Room Reservation History </a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>