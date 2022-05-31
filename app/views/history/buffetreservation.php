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
    <link rel="stylesheet" href="<?=SROOT?>css/reservationHistory.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <title>Buffet Reservation History</title>
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
<body style="background-color: #200300;">

<div>
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout" style="font-family: 'Ubuntu', sans-serif;"> Logout </a></li>
        </ul>
    </nav>
</div> <br><br><br>

<div id="reservations">
    <h1 class="title" style="font-family: 'Ubuntu', sans-serif;"> Your Buffet Reservation History </h1> <br>
    
    <div class="text-light mx-4 mt-3 mb-4">
        <label><h4>Search by Buffet Reservatation ID</h4></label>
        <input type="text" id="input" class="mx-2 text-center" onkeyup="search()">
    </div>
        
        <div class="w3-content" style="max-width:1532px;">
            <div class="w3-row-padding w3-padding-16">
                
                <?php for ($i = 0; $i < count($this->buffet_req_history); $i++) {
                    $reqs = $this->buffet_req_history[$i];
                ?>

                <div class="w3-third w3-margin-bottom">
                    <?php if($reqs->slot == "breakfast") { ?> 
                        <img src="<?=SROOT?>images/breakfast.jpg" alt="Breakfast" style="width:100%">
                    <?php } elseif($reqs->slot == "lunch"){ ?>
                        <img src="<?=SROOT?>images/lunch.jpg" alt="Lunch" style="width:100%">
                    <?php } elseif($reqs->slot == "dinner"){ ?>
                        <img src="<?=SROOT?>images/dinner.jpg" alt="Dinner" style="width:100%">
                    <?php } ?>
                    <div class="w3-container w3-white">
                        <br>
                        <p>Reservation ID : <?= $reqs->id ?> </p>
                        <p>Capacity : <?= $reqs->capacity ?> </p>
                        <p>Date : <?= $reqs->date ?></p>
                        <p>Slot : <?= $reqs->slot ?></p>
                        <p>Status : <?= $reqs->status ?> </p>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
</div>
<br><br>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>