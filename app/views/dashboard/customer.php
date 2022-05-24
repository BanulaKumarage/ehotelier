<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>
    <h1><?= $_SESSION['customername'] ?></h1>

    <div>
        <a href="<?=SROOT?>ReservationHandler/roomreservation">Room Reservation</a><br>
        <a href="<?=SROOT?>ReservationHandler/buffetreservation">Buffet Reservation</a> <br>
        <a href="<?=SROOT?>CustomerRequestHandler/create">Make a request</a> <br>
        <a href="">Rate the hotel</a> 
    </div>

    <br><br>
    <a href="<?=SROOT?>CustomerRegister/logout">Logout</a>
</body>
</html>