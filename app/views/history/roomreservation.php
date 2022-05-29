<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation History</title>
</head>
<body>

<div>
    <table>
        <h3>Room Reservation History Under Customer ID: <?= Customer::currentLoggedInCustomer()->id ?></h3>

        <br><br>

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
    </table>
</div>

</body>
</html>