<?php
$employee = Employee::currentLoggedInEmployee();
if ($employee->role != 'customercareofficer') {
    Router::redirect('EmployeeDashboard');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Manage Customer Requests</title>
</head>
<body>
    <div class="container-xl mt-5 mb-5">
        <!-- <h4>Manage Customer Requests</h3> -->

<?php $requests = $this->pendingRequests;
$count = 0 ?>
<h5 class="row justify-content-center mb-3">Manage Customer Requests</h5>
<div class="accordion accordion-flush" id="accordionFlushExample">

    <?php if($requests) {   
        
        foreach ($requests as $request) { ?>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?= $count ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?= $count ?>" aria-expanded="false" aria-controls="flush-collapseOne<?= $count ?>">
                        <?php
                        $request = (array) $request;
                        ?>
                        <div class="col-2">
                            Reservation ID:
                            <?php
                            echo $request["reservation_id"] ?>
                        </div>
                        <div class="col-2">
                            Customer ID:
                            <?php
                            echo $request["customer_id"]; ?>
                        </div>

                        <div class="col-5">
                            Request:
                            <?php
                            echo $request["description"]; ?>
                        </div>
                        <div class="col-3">
                            Time:
                            <?php
                            echo $request["timestamp"]; ?>
                        </div>

                    </button>
                </h2>

                <div id="flush-collapseOne<?= $count ?>" class="accordion-collapse collapse " aria-labelledby="flush-headingOne<?= $count ?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container-xl row justify-content-center bg-light">
                            <div class="row justify-content-left p-2 m-2">
                                <h6>Request: <span>
                                <?php echo $request["description"]; ?>
                                </span>
                                </h6>
                            </div>
                            <div class="row justify-content-center mb-1">
                            <?php if ($this->workerEmployees) {
                                foreach ($this->workerEmployees as $employee) {
                                    $employee = (array) $employee;
                                    ?>
                                    <div class="col col-xl-4 text-center mb-1">
                                        <?php echo $employee['name']; ?>
                                    </div>
                                    <div class="col col-xl-4 text-center mb-1">
                                        <?php echo $employee['status']; ?>
                                    </div>
                                <div class="col col-xl-2 text-center mb-1">
                                <form action="<?=SROOT?>CustomerRequestHandler/assignRequest" method="post">
                                    <input type="hidden" id="customer_request_id" name="customer_request_id" value="<?php echo $request['id'] ?>">
                                    <input type="hidden" id="employee_id" name="employee_id" value="<?php echo $employee['id'] ?>">
                                    <input class="btn btn-primary px-5 w-100" type="submit" name="assign" value="Assign" 
                                        <?php if ($employee['status'] == 'working') echo 'disabled'?>>
                                </form>
                                </div>
                                <?php 
                                }
                            } ?>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
    <?php $count++;
        } 
    } else {
        echo 'No customer requests'; 
    }?>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>