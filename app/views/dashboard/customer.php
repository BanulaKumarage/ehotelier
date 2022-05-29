<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Dashboard </title>
    <link rel="stylesheet" href="<?=SROOT?>css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
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
            <div class="title"> 
                <h1>Hello <?= $_SESSION['customername'] ?>!</h1> 
            </div>
            <br> <br>
            <div class="actions">
                <ul>
                    <li><a href="<?=SROOT?>ReservationHandler/roomreservation"> Room Reservation </a></li>
                    <li><a href="<?=SROOT?>ReservationHandler/buffetreservation"> Buffet Reservation </a></li>
                    <li><a href="<?=SROOT?>CustomerRequestHandler/create"> Make a Request </a></li>
                    <li><a href="<?=SROOT?>HotelReview/rate"> Rate the Hotel </a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>