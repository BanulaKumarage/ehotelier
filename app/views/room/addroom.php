<?php 
    if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
        
    }elseif ($_SESSION['role'] !== 'manager'){
        Router::redirect('EmployeeDashboard');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new room</title>
</head>
<body>
    <h1>Add a new Room</h1>
    <div>
        <form action="<?= SROOT ?>RoomStatus/addroom" method="post">
            <label>Type: </label>
            <select name="type">
                <option value="Suite">Suite</option>
                <option value="Quad">Quad</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Triple">Triple</option>
                <option value="Single">Single</option>
            </select>
            <input type="submit" value="Add">
        </form>

    </div>
</body>
</html>