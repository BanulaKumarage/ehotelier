<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign Up..</h1>
    <div>
        <form action="<?=SROOT?>CustomerRegister/signup" method="post">
            <label>Name : </label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>" required> <br><br>
            <label>Contact No : </label>
            <input type="text" name="contact_no" value="<?php echo htmlspecialchars($_POST['contact_no'] ?? '', ENT_QUOTES); ?>" required> <br><br>
            <label>Username : </label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" required> <br><br>
            <label>Password : </label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" required> <br><br>
            <label>Confirm Password : </label>
            <input type="password" name="repassword" value="<?php echo htmlspecialchars($_POST['repassword'] ?? '', ENT_QUOTES); ?>" required> <br><br>
            <input type="submit" value="Signup">
        </form>

        <span>
            <?php echo $this->displayErrors ?? ""; ?>
        </span>
    </div>
</body>
</html>