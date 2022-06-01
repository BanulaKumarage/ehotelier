<?php 
    if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
        
    }elseif ($_SESSION['role'] !== 'customercareofficer'){
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
    <link rel="stylesheet" href="<?=SROOT?>css/searchcustomer.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Search Customer</title>
</head>
<body style="background-color: #200300;">

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
    </div> <br><br><br>
    
        <h1 class="title"> Search Customer </h1> <br>
    
<form class="searchForm" action="<?= SROOT ?>CustomerSearch/searchcustomer" method="post">
    <div class="row g-3">
        <div class="col">
          <input type="text" class="form-control" id="search" name="customername" placeholder="Enter Customer Name">
        </div>
        <div class="col">
            <input id="submit" type="submit" class="submitBtn" value="Search">
        </div>
    </div>
</form>

<div class="w3-content" style="max-width:1532px;">
    <div class="w3-row-padding w3-padding-16">

        <?php if (isset($this->customernames)) {?>
            <?php for ($i = 0; $i < count($this->customernames); $i++) {
                $customer = $this->customernames[$i];
                ?>

                <div class="w3-third w3-margin-bottom">
                    <div class="w3-container w3-white"> <br>
                    <p> Name: <?= $customer->name ?> </p>
                    <p> Username: <?= $customer->username ?> </p>
                    <a href="<?=SROOT?>ReservationHandler/roomreservation/<?= $customer->id ?>" class="btn btn-primary"> Reserve </a> <br>
                    <br>
                    </div>
                </div>

        <?php }} ?>

    </div>
</div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>