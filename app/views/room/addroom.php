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
    <link rel="stylesheet" href="<?=SROOT?>css/addroom.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <title>Add a new room</title>
</head>
<body>

    <div class="banner">

        <nav style="font-family: 'Ubuntu', sans-serif;">
            <div class="navbar">
                <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
            </div>
            <ul class="links">
                <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
                <li> <a href="<?=SROOT?>EmployeeRegister/logout" style="font-family: 'Ubuntu', sans-serif;"> Logout </a></li>
            </ul>
        </nav>
        <br> <br> <br>

        <div class="container" style="font-family: 'Ubuntu', sans-serif;">
            <div class="form">
                <h1 style="font-family: 'Ubuntu', sans-serif; color:#E07B29;"> Add a new room </h1> <br>
                <form class="addRoom" action="<?= SROOT ?>RoomStatus/addroom" method="post">
                <div class="formGroup">
                    <select class="form-select" name='type'>
                        <option value="Suite">Suite</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Premium Deluxe">Premium Deluxe</option>
                        <option value="Quad">Quad</option>
                        <option value="Triple">Triple</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
                <br>
                <input type="submit" class="submitBtn" value="Add">
                </form>
            </div>
        </div> <br> <br>

        <div class="w3-row-padding">
            <div class="w3-third w3-container w3-margin-bottom">
              <img src="<?=SROOT?>images/suite.jpg" alt="Suite" style="width:100%">
              <div class="w3-container w3-white">
                <p><b>Suite</b></p>
              </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="<?=SROOT?>images/deluxe.jpg" alt="Deluxe" style="width:100%">
                <div class="w3-container w3-white">
                  <p><b>Deluxe</b></p>
                </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="<?=SROOT?>images/premiumdeluxe.jpg" alt="Premium Deluxe" style="width:100%">
                <div class="w3-container w3-white">
                  <p><b>Premium Deluxe</b></p>
                </div>
            </div>
        </div>

        <div class="w3-row-padding">
            <div class="w3-third w3-container w3-margin-bottom">
            <img src="<?=SROOT?>images/quad.jpg" alt="Quad" style="width:100%">
                <div class="w3-container w3-white">
                  <p><b>Quad</b></p>
                </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="<?=SROOT?>images/triple.jpeg" alt="Triple" style="width:100%">
                <div class="w3-container w3-white">
                  <p><b>Triple</b></p>
                </div>
            </div>
            <div class="w3-third w3-container w3-margin-bottom">
                <img src="<?=SROOT?>images/single2.jpg" alt="Single" style="width:100%">
                <div class="w3-container w3-white">
                  <p><b>Single</b></p>
                </div>
            </div>
        </div>

        <br><br>

</body>
</html>