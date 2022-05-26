<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .outer{
            padding: 1%;
        }

    </style>

</head>
<body>

<h1>Monitor Rooms</h1>
<br><br>
<!--<div class='container'>-->
    <div class='container'>
        <div class="row row-cols-4">
<?php
    foreach ($this->roomDetails as $roomDetail){
        echo "
        
        <div class='col outer'>
        <div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>Room NO: ".$roomDetail->{'id'} ."</h5>
                <p class='card-text'>Capacity : " .$roomDetail->{'capacity'} . "</p>
                <p class='card-text'>Type : " .$roomDetail->{'type'} . "</p>
                <p class='card-text'>Status : " .$roomDetail->{'status'} . "</p>
                <p class='card-text'>Last Service : " .$roomDetail->{'last_service'} . "</p>
            </div>
        </div> 
        </div>
       
        ";

    }
?>
        </div>
    </div>
<!--</div>-->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>