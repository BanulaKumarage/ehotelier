<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Sign up</title>
    <style>
        .login-form{
            margin: 20px;
        }
        .remove-form{
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>Add Employee..</h1>
<div class="login-form">
    <form action="<?=SROOT?>EmployeeRegister/addEmployee" method="post">
        <div class="row">
        <div class="col-lg-6">
        <label class="form-label">Name : </label>
        <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>

        <div class="col-lg-6">
        <label class="form-label">Contact No : </label>
        <input class="form-control" type="text" name="contact_no" value="<?php echo htmlspecialchars($_POST['contact_no'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        <label class="form-label">Username : </label>
        <input class="form-control" type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>

        <div class="col-lg-6">
        <label class="form-label">Email : </label>
        <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-6">
        <label class="form-label">Password : </label>
        <input class="form-control" type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>

        <div class="col-lg-6">
        <label class="form-label">Confirm Password : </label>
        <input class="form-control" type="password" name="repassword" value="<?php echo htmlspecialchars($_POST['repassword'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
        <select class="form-select" name='role' id='role'>
            <option value='worker'>Worker</option>
            <option value='customercareofficer'>Customer Care Officer</option>
        </select>
            </div>
            <div class="col-lg-3">
        <input class="btn btn-success btn-lg" type="submit" value="AddEmployee">
            </div>
        </div>


    </form>



</div>

<br><br><br>

<!--to remove employee-->
<form class="remove-form" action="<?=SROOT?>EmployeeRegister/removeEmployee" method="post">
    <h4>Enter email of the removing employee</h4>
    <br>
    <div class="row">

    <div class="col-lg-1">
        <label class="form-label">Username : </label>
    </div>
        <div class="col-lg-4">
        <input class="form-control" type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>

    <div class="col-lg-3">
        <input class="btn btn-secondary btn-lg" type="submit" value="RemoveEmployee">
    </div>
    </div>
</form>
<form class='remove-form' action='<?=SROOT?>EmployeeRegister/confirmRemoveEmployee' method='post'>
<?php
if (isset($this->removingEmployee)){
    $removingEmployee = $this->removingEmployee;
//    echo $removingEmployee[0]->{'username'};
    echo " 
    
        
    <div class='row' style='padding-left: 300px'>
    <div class='col-lg-3'> 
    <h6>Removing employee : <span>" . $removingEmployee[0]->{'username'} . "</span></h6>    
    </div>
    <div class='col-lg-2'>
        <input type='hidden' name='username' value='" . $removingEmployee[0]->{'username'} ." ' >
        <input class='btn btn-success ' type='submit' value='confirmRemove'>
    </div>
    </form>
    <form class='remove-form' action='".SROOT."EmployeeRegister/cancelRemoveEmployee' method='post'>
    <div class='col-lg-2' style='padding-left: 300px'>
        <input class='btn btn-danger ' type='submit' value='cancel'>
    </div>
    </form>
    </div>
    
    
    ";
}

?>
    <span>
        <div style="color: aliceblue">
            <?php echo $this->displayErrors ?? ""; ?>
            </div>
    </span>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>