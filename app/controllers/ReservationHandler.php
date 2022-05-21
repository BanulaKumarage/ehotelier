<?php

class ReservationHandler extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Room_reservation');
        $this->load_model('Room');
        $this->load_model('Buffet_reservation');
    }

    public function roomreservationAction()
    {
        $validation = new Validate();

        if ($_POST) {
            $validation->check($_POST,[
                'occupancy'=>[
                    'display'=>"Number of People",
                    'is_numeric'=>true
                ]
            ]);
            $validation->dateCheck($_POST["check_in_date"],$_POST["check_out_date"]);

            if ($validation->passed()){

                $rooms = $this->RoomModel->getallrooms();
                $options = $this->Room_reservationModel->getavailableoptions($_POST,$rooms);
                $_SESSION['options'] = $options;
                $_SESSION['type'] = $_POST["type"];
                $_SESSION['check_in_date'] = $_POST["check_in_date"];
                $_SESSION['check_out_date'] = $_POST["check_out_date"];
                Router::redirect("ReservationHandler/viewoptions");
            }else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('reservation/room');
            }
        } else {
            $this->view->render('reservation/room');
        }
    }

    public function buffetreservationAction()
    {
        $validation = new Validate();
        if ($_POST) {
            $validation->check($_POST,[
                'capacity'=>[
                    'display'=>"Number of People",
                    'is_numeric'=>true
                ]
            ]);
            $validation->currentDatecheck($_POST['date']);

            if ($validation->passed()){
                $this->Buffet_reservationModel->reserve($_POST);
               
                Router::redirect("CustomerDashboard");
            }else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('reservation/buffet');
            }
        } else {
            $this->view->render('reservation/buffet');
        }
    }

    public function viewoptionsAction(){
        $this->view->allrooms = $this->RoomModel->getAllRoomOptions($_SESSION['options']);
        $this->view->render('reservation/optionlist');
        
    }

    public function reserveAction($id){
        $reservation = new Room_reservation();
        $reservation->room_ids = $_SESSION['options'][$id];
        $reservation->customer_id = Customer::currentLoggedInCustomer()->id;
        $reservation->check_in_date = $_SESSION['check_in_date'];
        $reservation->check_out_date = $_SESSION['check_out_date'];
        $reservation->type = $_SESSION['type'];
        $reservation->status = "reserved";
        $reservation->save();
        $this->RoomModel->reserve($_SESSION['options'][$id]);
        Router::redirect("CustomerDashboard");
    }
}
