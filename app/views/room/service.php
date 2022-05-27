<?php
$employee = Employee::currentLoggedInEmployee();
if ($employee->role != 'worker') {
    Router::redirect('EmployeeDashboard');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Service</title>
</head>

<body>
    <h1>Room Service</h1> <br>

    <div>

    <table>
    <?php $rooms = $this->roomDetails; 
    foreach ($rooms as $room) {
        $room = (array) $room;?>
        <tr>
            <td>
            <?php echo $room['id'];?>
            </td>
            <td>
            <?php echo $room['type'];?>
            </td>
            <td>
            <?php echo $room['capacity'];?>
            </td>
            <td>
            <?php echo $room['status'];?>
            </td>
            <td>
            <?php echo $room['last_service'];?>
            </td>
            <td>
            <form action="<?=SROOT?>RoomStatus/service" method="post">
                <input type="hidden" name="id" value="<?php echo $room['id'] ?>">
                <input type="hidden" name="last_service" value="">
                <input type="submit" value="Serviced">
            </form>
            </td>
        </tr>
    
    <?php } ?>
    </table>
    </div>
</body>

</html>