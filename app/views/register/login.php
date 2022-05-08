<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>Customer Login</h1>
        <div>
            <form action="<?=SROOT?>/CustomerRegister/login" method="post">
                <label>Username</label><br>
                <input type="text" placeholder="Username" name="username"><br><br>

                <label>Password</label><br>
                <input type="password" placeholder="Password" name="password"><br><br>

                <input type="submit" class="btn btn-primary" name="submit" value="Sign-in">
                
                <span>
                    <?php 
                        if (isset($this->message)){
                            echo $this->message;
                        }
                    ?>
                </span>
            </form>
        </div>
    </div>
</body>
</html>