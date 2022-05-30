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
    <link rel="stylesheet" href="<?=SROOT?>css/roomResHistory.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Room Reservation History</title>
    <script>
        function search() {
            var input, filter, reservations, reservation, l, i, txtValue;
            input = document.getElementById("input");
            filter = input.value.toUpperCase();
            reservations = document.getElementById("reservations");
            div = reservations.getElementsByTagName("div");

            for (i = 0; i < div.length; i++) {
                l = div[i].getElementsByTagName("label")[0];
                txtValue = l.textContent || l.innerText;
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
<body>

    <!-- navbar -->
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>CustomerRegister/logout"> Logout </a></li>
        </ul>
    </nav>

    <br><br><br>

<div>
    <div id="reservations">
    <h1 class="title">Room Reservation History Under Customer ID: <?= Customer::currentLoggedInCustomer()->id ?></h1>
    <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16">

        <br><br>

        <input type="text" id="input" onkeyup="search()" class="ml-1 mt-3 mb-4" placeholder="Search by reservation ID">
        
        <?php for ($i = 0; $i < count($this->room_req_history); $i++) {
            $reqs = $this->room_req_history[$i];
            ?>

            <div>
                <label>Reservation ID : <?= $reqs->id ?></label> <br>
                <label>Room IDs : <?= $reqs->room_ids ?></label> <br>
                <label>Check-in Date : <?= $reqs->check_in_date ?></label> <br>
                <label>Check-out Date : <?= $reqs->check_out_date ?></label> <br>
                <label>Type : <?= $reqs->type ?></label> <br>
                <label>Status : <?= $reqs->status ?></label> <br>

            </div>

            <br><br>

        <?php } ?>
        </div>
    </div>
    </div>
</div>

</body>
</html>