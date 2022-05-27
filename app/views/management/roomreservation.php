<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation Management</title>
</head>
<body>


<table>
    <h3>Room Reservation Details</h3>


    <?php for ($i = 0; $i < count($this->allroom_reqs); $i++) {
        $reqs = $this->allroom_reqs[$i];
        ?>

        <div>
            <label>Room IDs : <?= $reqs->room_ids ?></label> <br>
            <label>Customer ID : <?= $reqs->customer_id ?></label> <br>
            <label>Check-in Date : <?= $reqs->check_in_date ?></label> <br>
            <label>Check-out Date : <?= $reqs->check_out_date ?></label> <br>
            <label>Type : <?= $reqs->type ?></label> <br>
            <label>Status : <?= $reqs->status ?></label> <br>

        </div><br>

    <?php } ?>
</table>


</body>
</html>