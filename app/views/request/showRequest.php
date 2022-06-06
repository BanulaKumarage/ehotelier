<?php 
    if (!isset($_SESSION['employeename'])){
        if (isset($_SESSION['customername'])){
            Router::redirect('CustomerDashboard');
        }else {
            Router::redirect('');
        }
        
    }elseif ($_SESSION['role'] !== 'worker'){
        Router::redirect('EmployeeDashboard');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/showRequest.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <title> View Assigned Customer Requests </title>
</head>

<body style="background-color: #200300;">

    <div>
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
    </nav>
    </div> <br><br><br>

    <h1 class="title">Handle Customer Requests</h1> <br>

    <div class="w3-content" style="max-width:1532px;">
    <div class="w3-row-padding w3-padding-16">

    <?php if (count($this->customerRequests) > 0) {
    foreach ($this->customerRequests as $customerRequest) { ?>
    
        <div class="w3-third w3-margin-bottom">
            <div class="w3-container w3-white"> <br>
                <form action='<?=SROOT?>CustomerRequestHandler/updateRequest' method='post'>
                    <p> Reservation ID : <?php echo $customerRequest[0]->{"reservation_id"} ?></p>
                    <p> Current Status : <?php echo ucwords($customerRequest[0]->{"status"}) ?></p>
                    <p> Request Description : <?php echo $customerRequest[0]->{"description"} ?> </p> 
                    <input type='hidden'  name='customer_req_id' value='<?php echo $customerRequest[0]->{'id'} ?>'>
                    <select class="form-select" name='requestStatus' id='request' onchange= 'this.form.submit()' style="max-width:90%;">
                        <option disabled selected value> Select Status </option>
                        <option value='attended'>Attended</option>
                        <option value='completed'>Completed</option>
                    </select> <br>
                </form>
            </div>
        </div>
        
            
    <br><br>
    <?php }} else{ ?>
        <h2 style="font-family: 'Ubuntu', sans-serif; margin-left:20px; color:white">No Assigned Customer Requests</h2>
    <?php }?>


    </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>