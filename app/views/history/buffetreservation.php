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
<body>

<div id="reservations">
    <h3>Buffet Reservation History Under Customer ID: <?= Customer::currentLoggedInCustomer()->id ?></h3>

    <br><br>
    <input type="text" id="input" onkeyup="search()" class="ml-1 mt-3 mb-4" placeholder="Search by reservation ID">
    <?php for ($i = 0; $i < count($this->buffet_req_history); $i++) {
        $reqs = $this->buffet_req_history[$i];
        ?>

        <div>
            <label>Reservation ID : <?= $reqs->id ?></label> <br>
            <label>Capacity : <?= $reqs->capacity ?></label> <br>
            <label>Date : <?= $reqs->date ?></label> <br>
            <label>Slot : <?= $reqs->slot ?></label> <br>
            <label>Status : <?= $reqs->status ?></label> <br>
        </div>
        <br><br>

    <?php } ?>
    </div>


</body>
</html>