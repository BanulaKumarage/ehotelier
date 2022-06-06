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


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=SROOT?>css/monitorroom.css">
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Monitor Room Status </title>
    <script>
        function search() {
            var input, filter, rooms, div, h3, i, txtValue;
            input = document.getElementById("input");
            filter = input.value.toUpperCase();
            rooms = document.getElementById("rooms");
            div = rooms.getElementsByTagName("div");

            for (i = 0; i < div.length; i++) {
                h3 = div[i].getElementsByTagName("h3")[0];
                txtValue = h3.textContent || h3.innerText;
                txtValue = txtValue.replace(' Room NO: ','');
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    div[i].style.display = "";
                } else {
                    div[i].style.display = "none";
                }
            }
        }       
    </script>
</head>

<body>

    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
            <li> <a href="<?=SROOT?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
    </nav>

    <br><br><br>

    <!-- Page content -->

    <h1 class="title"> Room Status </h1> <br>
    
    <input type="text" id="input" onkeyup="search()" style="margin-left:25px; margin-bottom:20px; text-align: center;" placeholder="Search by room number">

    <div class="w3-content" style="max-width:1532px;">
        <div class="w3-row-padding w3-padding-16" id="rooms">

        <?php if ($this->roomDetails) {
        foreach ($this->roomDetails as $roomDetail){ ?>
            <div class="w3-third w3-margin-bottom">
              <?php if($roomDetail->{'type'} == "Deluxe") { ?> 
              <img src="<?=SROOT?>images/deluxe2.jpg" alt="Deluxe" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Premium Deluxe"){ ?>
              <img src="<?=SROOT?>images/premiumdeluxe.jpg" alt="Premium Deluxe" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Quad"){ ?>
              <img src="<?=SROOT?>images/quad2.jpg" alt="Quad" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Single"){ ?>
              <img src="<?=SROOT?>images/single2.jpg" alt="Single" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Suite"){ ?>
              <img src="<?=SROOT?>images/suite2.jpg" alt="Suite" style="width:100%">
              <?php } elseif($roomDetail->{'type'} == "Triple"){ ?>
              <img src="<?=SROOT?>images/triple2.jpg" alt="Triple" style="width:100%">
              <?php } ?>
              <div class="w3-container w3-white">
                <h3> Room NO: <?php echo $roomDetail->{'id'} ?> </h3>
                <h6 class="w3-opacity"> Capacity : <?php echo $roomDetail->{'capacity'} ?></h6>
                <h6 class="w3-opacity"> Type : <?php echo $roomDetail->{'type'} ?> </h6>
                <h6 class="w3-opacity"> Status : <?php echo ucwords($roomDetail->{'status'}) ?> </h6>
                <h6 class="w3-opacity"> Last Service : <?php echo $roomDetail->{'last_service'} ?>  </h6>
              </div>
            </div>
        <?php } 
        } else {?>
            <h2 style="font-family: 'Ubuntu', sans-serif; margin-left:20px; color:white">No Rooms Available</h2>
        <?php }?>      
   

        </div>
    </div>


</body>
</html>