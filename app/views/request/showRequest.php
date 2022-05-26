<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
//var_dump($this->customerRequests);
?>
<h1>Employee request handle</h1>

    <?php
    foreach ($this->customerRequests as $customerRequest) {
        var_dump($customerRequest[0]->{'id'});
        echo "<br><br>";
        echo "  <form action='".SROOT."CustomerRequestHandler/updateRequest' method='post'>
                <div class='card w-75'>
                <div class='card-body'>
                    <h5 class='card-title'> Reservation ID :" . $customerRequest[0]->{"reservation_id"} . "</h5>
                    <h5 class='card-title'> Current Status :" . $customerRequest[0]->{"status"} . "</h5>
                    <p class='card-text'>" . $customerRequest[0]->{"description"} . "</p>
                    <input type='hidden'  name='customer_req_id' value=" . $customerRequest[0]->{'id'} .">
                    <label for='requestStatus'>select status :</label>
                    <select name='requestStatus' id='request' onchange= 'this.form.submit()'>
                        <option disabled selected value> -- select an option -- </option>
                        <option value='attended'>Attended</option>
                        <option value='completed'>Completed</option>
                    </select>
                </div>
            </div>
            </form>
            
    <br><br>
    ";

    }
    ?>














</body>
</html>