<?php 
    if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
        
    }elseif ($_SESSION['role'] !== 'customercareofficer'){
        Router::redirect('EmployeeDashboard');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation Management</title>
    <link rel="stylesheet" href="<?=SROOT?>css/roomreservation.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script>
        function search() {
            var input, filter, reservations, div, p, i, txtValue;
            input = document.getElementById("input");
            filter = input.value.toUpperCase();
            reservations = document.getElementById("reservations");
            div = reservations.getElementsByTagName("div");

            for (i = 0; i < div.length; i++) {
                p = div[i].getElementsByTagName("p")[0];
                txtValue = p.textContent || p.innerText;
                txtValue = txtValue.replace('Reservation ID : ','');
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    div[i].style.display = "";
                } else {
                    div[i].style.display = "none";
                }
            }
        }        
    </script>
</head>
<body style="background-color: #200300;">

    <div>
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
    </nav>
    </div> <br><br><br>

    <h1 class="title"> Room Reservation Details </h1> <br>
    <div class="text-light mx-4 mt-3 mb-4">
        <label><h4>Search by Reservatation ID</h4></label>
        <input type="text" id="input" class="mx-2 text-center" onkeyup="search()">
    </div>
    <div class="filter">
        <form action='<?= SROOT ?>ReservationHandler/roomrequest' method='post'>
            <h3 for="filter">Filter by Status</h3>
            <select class="form-select" name='filter_roomstatus' onchange='this.form.submit()' style="width:200px;">
                <option value="" selected disabled hidden>Choose here</option>
                <option value="all">All</option>
                <option value="reserved">Reserved</option>
                <option value="paid">Paid</option>
            </select>
        </form>
    </div>

    <br>

    <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16" id="reservations">

        <?php for ($i = 0; $i < count($this->allroom_reqs); $i++) {
            $reqs = $this->allroom_reqs[$i];
        ?>
            <div class="w3-third w3-margin-bottom">
              <div class="w3-container w3-white">
                <!--<h6 class="w3-opacity">From $99</h6>-->
                <br>
                <p>Reservation ID : <?= $reqs->id ?> </p>
                <p>Room IDs : <?= $reqs->room_ids ?> </p>
                <p>Customer ID : <?= $reqs->customer_id ?> </p>
                <p>Check-in Date : <?= $reqs->check_in_date ?></p>
                <p>Check-out Date : <?= $reqs->check_out_date ?> </p>
                <p>Type : <?= $reqs->type ?></p>
                <p>Status : <?= $reqs->status ?> </p>
                <form action="<?= SROOT ?>ReservationHandler/changeroomreservation_status/<?= $reqs->id ?>" method="post">
                    <select class="form-select" name="room_res_status" style="max-width:90%;">
                        <option value="" disabled selected>Choose Status</option>
                        <option value="reserved">Reserved</option>
                        <option value="paid">Paid</option>
                        <option value="closed">Closed</option>
                    </select> <br>
                    <input class="submitBtn" type="submit" name="submit" value="Choose Option">
                </form>
                <br>
              </div>
            </div>
        <?php } ?>

        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>