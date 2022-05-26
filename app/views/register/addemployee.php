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



    <span>
            <?php echo $this->displayErrors ?? ""; ?>
        </span>
</div>

<br><br><br>

<!--to remove employee-->
<form class="remove-form" action="<?=SROOT?>EmployeeRegister/removeEmployee" method="post">
    <h4>Enter email of the removing employee</h4>
    <br>
    <div class="row">

    <div class="col-lg-1">
        <label class="form-label">Email : </label>
    </div>
        <div class="col-lg-4">
        <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" required> <br><br>
        </div>

    <div class="col-lg-3">
        <input class="btn btn-danger btn-lg" type="submit" value="RemoveEmployee">
    </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>