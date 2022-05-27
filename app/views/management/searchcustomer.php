<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
</head>
<body>

<form action="<?= SROOT ?>CustomerSearch/searchcustomer" method="post">
    <input id="search" name="customername" type="text" placeholder="Enter customer name">
    <input id="submit" type="submit" value="Search">
</form>

<div>
    <table>
        <?php if (isset($this->customernames)) {?>
        <?php for ($i = 0; $i < count($this->customernames); $i++) {
            $customer = $this->customernames[$i];
            ?>

                <div>
                    <label>Name: <?= $customer->name ?></label> <br>
                    <label>Username: <?= $customer->username ?></label> <br>
                </div><br>

        <?php }} ?>
    </table>
</div>


</body>
</html>