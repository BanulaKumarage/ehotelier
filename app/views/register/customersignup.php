<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=SROOT?>css/customersignup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
 
  <!-- jQuery CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title> Sign up </title>
</head>
 
<body>
  <div class="banner">
  <div class="navbar">
    <img src="<?=SROOT?>images/logo-1.png" class="logo">
  </div>
  <div class="container">
    <div class="form">
        <h1> Sign up </h1>
        <form class="signUp" action="<?=SROOT?>CustomerRegister/signup" method="post">
        <div class="formGroup">
          <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>" placeholder="Name" required>
        </div>
        <div class="formGroup">
          <input type="text" name="contact_no" value="<?php echo htmlspecialchars($_POST['contact_no'] ?? '', ENT_QUOTES); ?>" placeholder="Contact Number" required>
        </div>
        <div class="formGroup">
          <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" placeholder="User Name" required>
        </div>
        <div class="formGroup">
          <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" placeholder="Password" required>
        </div>
        <div class="formGroup">
          <input type="password" name="repassword" value="<?php echo htmlspecialchars($_POST['repassword'] ?? '', ENT_QUOTES); ?>" placeholder="Confirm Password" required>
        </div>
        <br>
        <!--
        <div class="formGroup">
          <button type="button" class="btn2"> SIGN UP </button>
        </div>
        -->
        <input type="submit" class="submitBtn" value="Signup">
        </form>
    </div>
    <span>
      <?php echo $this->displayErrors ?? ""; ?>
    </span>
  </div>
  </div>
 
  <script src="jQuery.js"></script>
</body>
 
</html>