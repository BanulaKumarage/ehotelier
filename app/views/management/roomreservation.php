<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation Management</title>
</head>
<body>

<div>
    <table>
        <h3>Room Reservation Details</h3>


        <div>
            <form action='<?= SROOT ?>ReservationHandler/roomrequest' method='post'>
                <label for="filter">Filter by Status</label>
                <select name='filter_roomstatus' onchange='this.form.submit()'>
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="all">All</option>
                    <option value="reserved">Reserved</option>
                    <option value="paid">Paid</option>
                    <option value="closed">Closed</option>
                </select>
            </form>
        </div>
        <br><br><br>


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

            </div>

            <div>
                <form action="<?= SROOT ?>ReservationHandler/changeroomreservation_status/<?= $reqs->id ?>"
                      method="post">
                    <select name="room_res_status">
                        <option value="" disabled selected>Choose Status</option>
                        <option value="reserved">Reserved</option>
                        <option value="paid">Paid</option>
                        <option value="closed">Closed</option>
                    </select>
                    <input type="submit" name="submit" value="Choose Option">
                </form>
            </div>
            <br><br>

        <?php } ?>
    </table>
</div>

</body>
</html>