<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffet Reservation Management</title>
</head>
<body>

<table>
    <h3>Buffet Reservation Details</h3>


    <?php for ($i = 0; $i < count($this->allbuffet_reqs); $i++) {
        $reqs = $this->allbuffet_reqs[$i];
        ?>

        <div>
            <label>Reservation ID : <?= $reqs->id ?></label> <br>
            <label>Customer ID : <?= $reqs->customer_id ?></label> <br>
            <label>Capacity : <?= $reqs->capacity ?></label> <br>
            <label>Date : <?= $reqs->date ?></label> <br>
            <label>Slut : <?= $reqs->slot ?></label> <br>
            <label>Status : <?= $reqs->status ?></label> <br>


            <div>
                <form action="<?= SROOT ?>ReservationHandler/changebuffetreservation_status/<?= $reqs->id ?>" method="post">
                    <select name="buffet_res_status">
                        <option value="" disabled selected>Choose Status</option>
                        <option value="accepted">Accepted</option>
                        <option value="closed">Closed</option>
                    </select>
                    <input type="submit" name="submit" vlaue="Choose Options">
                </form>
            </div>

        </div>
        <br><br>

    <?php } ?>
</table>


</body>
</html>