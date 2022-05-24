<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Request</title>
</head>
<body>
    <h1>Customer Request</h1>
    <div>
        <form action="<?=SROOT?>CustomerRequestHandler/create" method="post">
            <label>Room Reservation Id: </label>
            <input type="text" name="reservation_id" required><br><br>
            <label>Description: </label>
            <textarea name="description" required></textarea>
            <input type="submit" value="Create Request">
        </form>

        <span>
            <?php echo $this->errors ?? ""; ?>
        </span>
    </div>
</body>
</html>