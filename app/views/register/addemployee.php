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
    <title>Add/Remove Employee</title>
    <link rel="stylesheet" href="<?=SROOT?>css/addemployee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body style="background-color: #200300;">
    <nav>
        <div class="navbar">
            <a href="<?=SROOT?>"> <img src="<?=SROOT?>images/logo-1.png" class="logo"> </a>
        </div>
        <ul class="links">
            <li> <a href="<?= SROOT ?>EmployeeRegister/logout"> Logout </a></li>
        </ul>
    </nav>

    <br> <br> <br>

    <!-- Page content -->

    <div>
    <h1 class="title"> Add Employee </h1> 

    <div class="container">
        <div class="form">
            <form class="addEmp" action="<?=SROOT?>EmployeeRegister/addEmployee" method="post">
            <br>
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
                <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" placeholder="Email" required>
              </div>
            <div class="formGroup">
              <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" placeholder="Password" required>
            </div>
            <div class="formGroup">
              <input type="password" name="repassword" value="<?php echo htmlspecialchars($_POST['repassword'] ?? '', ENT_QUOTES); ?>" placeholder="Confirm Password" required>
            </div>
            <div class="formGroup">
                <select class="formSelect" name='role' onchange='this.form.submit()' style="width:80%;" id="role">
                    <option value='worker'>Worker</option>
                    <option value='customercareofficer'>Customer Care Officer</option>
                </select>
            </div>
            <br>
            <input type="submit" class="submitBtn" value="AddEmployee"> 
            <br>
            </form>
        </div>
    </div>
    </div>

    <br> <br> <br>

    <!-- Remove employee -->
    <div>
        <h1 class="title"> Remove Employee </h1> 
    
        <div class="container">
            <div class="form">
                <form class="removeEmp" action="<?=SROOT?>EmployeeRegister/removeEmployee" method="post">
                <br>
                <div class="formGroup">
                  <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" placeholder="User Name" required>
                </div>
                <input type="submit" class="submitBtn" value="RemoveEmployee"> 
                <br>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Confirm remove -->
    <br> <br> <br>
    
    <div>
        <div>
                <form class="confirm" action="<?=SROOT?>EmployeeRegister/confirmRemoveEmployee" method="post">
                <?php
                if (isset($this->removingEmployee)){
                    $removingEmployee = $this->removingEmployee; ?>
                <h5 class="title"> Confirm Remove? </h5> 
                <input type="text" name="username" value="<?= $removingEmployee[0]->{'username'} ?>" hidden>
                <input type="submit" class="submitBtn" value="confirmRemove">
                <br>
                </form>
                <form class="cancel" action="<?=SROOT?>EmployeeRegister/cancelRemoveEmployee" method="post">
                    <input type="submit" class="submitBtn" value="cancel"> 
                    <br>
                </form>
                <?php } ?>
        </div>  
    </div>


    <span class="errors">
      <?php echo $this->displayErrors ?? ""; ?>
    </span>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>