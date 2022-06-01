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
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/service.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Room Service</title>
    <script>
        function showModal(id) {
            document.getElementById("room_id").value = id;
            document.getElementById("room_number").innerHTML = id;
        }
        function search() {
            var input, filter, rooms, tr, th, i, txtValue;
            input = document.getElementById("input");
            filter = input.value.toUpperCase();
            rooms = document.getElementById("rooms");
            tr = rooms.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                th = tr[i].getElementsByTagName("th")[0];
                txtValue = th.textContent || th.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }        
    </script>
</head>

<body style="background-color: #200300; font-family: 'Ubuntu', sans-serif;">

    <div>
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href=""> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
    </nav>
    </div> <br>

    <div class="container-xl mt-5 mb-5">
    <h1 class="title">Room Service</h1>
   
    <input type="text" id="input" onkeyup="search()" class="m-3 text-center" placeholder="Search by room number"> <br>

    <div class="table-responsive no-wrap">
        <table class="table table-hover table-borderless align-middle no-wrap" style="--bs-table-hover-color: #E07B29;">
            <thead class="thead" style="color: #E07B29;">
                <tr>
                    <th>Room</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Last Service</th>
                    <th> Update Status</th>
                </tr>
            </thead>
            <tbody id="rooms" style="color: white;">
            <?php $rooms = $this->roomDetails; 
                foreach ($rooms as $room) {
                    $room = (array) $room;?>
                    <tr class="border-top">
                        <th>
                        <?php echo $room['id'];?>
                        </th>
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
                        <button type="button" class="btn btn-primary" onClick="showModal(<?php echo $room['id'] ; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Serviced
                        </button>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
 
    <form action="<?=SROOT?>RoomStatus/service" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="fs-1">Room <span id="room_number"></span></div>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" id="room_id" name="id" value="">
                <input type="hidden" name="last_service" value="">
                <input class="btn btn-success fs-4" type="submit" value="Confirm">
            </div>
        </div>
    </div>
    </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
