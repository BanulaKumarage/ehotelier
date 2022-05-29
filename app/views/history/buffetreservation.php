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
</head>
<body>

<table>
    <h3>Buffet Reservation History Under Customer ID: <?= Customer::currentLoggedInCustomer()->id ?></h3>

    <br><br>

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
</table>


</body>
</html>