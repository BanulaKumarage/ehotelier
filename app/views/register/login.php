<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=SROOT?>images/favicon2.jpg" type="image/jpg">
  <link rel="stylesheet" href="<?=SROOT?>css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
 
  <!-- jQuery CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title> Customer Login </title>
</head>
 
<body>
  <div class="banner">
  <div class="navbar">
    <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
  </div>
  <div class="container">
    <div class="form">
        <h1> Customer Login </h1> <br>
        <form action="<?=SROOT?>CustomerRegister/login" method="post">
        <div class="formGroup">
          <input type="text" name="username" placeholder="Username" required>
        </div> <br>
        <div class="formGroup">
          <input type="password" name="password" placeholder="Password" required>
        </div> 
        <br> <br>
        <input type="submit" class="submitBtn" name="submit" value="Sign-in"> <br>
        </form>
    </div>
  </div>
  <span class="errors">
    <?php echo $this->message ?? ""; ?>
  </span>
  </div>
 
  <script src="<?=SROOT?>js/signup_login.js"></script>
</body>
 
</html>