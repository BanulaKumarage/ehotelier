<?php
    $logoutlink = "";
    if (isset($_SESSION['customername'])){
        $logoutlink = "EmployeeRegister/logout";
    }elseif(isset($_SESSION['employeename'])){
        $logoutlink = "CustomerRegister/logout";
    }
    $logoutlink = SROOT.$logoutlink;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/404.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <title>404</title>
</head>
<body>
    <div class="banner">
        <div>
        <nav>
            <div class="navbar">
                <img src="<?=SROOT?>images/logo-1.png" class="logo">
            </div>
            <ul class="links">
                <li> <a href="<?=SROOT?>"> Dashboard </a></li> <p>&nbsp;&nbsp;</p>
                <?php if (isset($_SESSION['customername']) || isset($_SESSION['employeename'])) {?>
                <li> <a href=<?=$logoutlink?>> Logout </a></li>
                <?php }?>
            </ul>
        </nav>
        </div>

        
        <div class="container">
            <div class="content">
                <h1>404 Not Found</h1>
            </div>
        </div>
        

    </div>
</body>
</html>