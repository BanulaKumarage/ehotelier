<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> eHotelier </title>
    <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
    <link rel="stylesheet" href="<?=SROOT?>css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .content a{
            text-decoration: none;
            color: white;
        }

        .alert-dismissible .btn-close {
           padding: 0.3em;
        }
    </style>

</head>

<body>
    <div class="banner">

        <div class="navbar">
            <img src="<?=SROOT?>images/logo-1.png" class="logo">
        </div>

        <div class="content">

        <?php if (isset($_SESSION['message']) && $_SESSION['message'] !== ""){ ?>
            <div class="alertBox">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 70%; text-align:center; display:inline-block;">
                <strong> <?php echo $_SESSION['message']; ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php } ?>
        
            <br>
            <h1> Welcome to eHotelier </h1> <br> <br>
            <div>
                <ul>
                <li><a href="<?=SROOT?>CustomerRegister/login">Customer Login</a></li>
                    <li><a href="<?=SROOT?>CustomerRegister/signup">Join now</a></li>
                    <li><a href="<?=SROOT?>EmployeeRegister/login">Employee Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</body>
</html>