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

    public function roomreservationAction($id = "")
    {
        $validation = new Validate();

        if ($_POST) {
            $validation->check($_POST, [
                'occupancy' => [
                    'display' => "Number of People",
                    'is_numeric' => true
                ]
            ]);
            $validation->dateCheck($_POST["check_in_date"], $_POST["check_out_date"]);

            if ($validation->passed()) {

                $rooms = $this->RoomModel->getallrooms();
                $options = $this->Room_reservationModel->getavailableoptions($_POST, $rooms);
                $_SESSION['options'] = $options;
                $_SESSION['type'] = $_POST["type"];
                $_SESSION['check_in_date'] = $_POST["check_in_date"];
                $_SESSION['check_out_date'] = $_POST["check_out_date"];
                Router::redirect("ReservationHandler/viewoptions");
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('reservation/room');
            }
        } else {
            $_SESSION['customer_id'] = $id;
            $this->view->render('reservation/room');
        }
    }

    public function buffetreservationAction()
    {
        $validation = new Validate();
        if ($_POST) {
            $validation->check($_POST, [
                'capacity' => [
                    'display' => "Number of People",
                    'is_numeric' => true
                ]
            ]);
            $validation->currentDatecheck($_POST['date']);

            if ($validation->passed()) {
                $this->Buffet_reservationModel->reserve($_POST);

                Router::redirect("CustomerDashboard");
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('reservation/buffet');
            }
        } else {
            $this->view->render('reservation/buffet');
        }
    }

    public function viewoptionsAction()
    {
        $this->view->allrooms = $this->RoomModel->getAllRoomOptions($_SESSION['options']);
        $this->view->render('reservation/optionlist');

    }

    public function reserveAction($id)
    {
        $reservation = new Room_reservation();
        $reservation->room_ids = $_SESSION['options'][$id];
        if (isset($_SESSION['role'])){
            $reservation->customer_id =$_SESSION['customer_id'];
        }else {
            $reservation->customer_id = Customer::currentLoggedInCustomer()->id;
        }
        $reservation->check_in_date = $_SESSION['check_in_date'];
        $reservation->check_out_date = $_SESSION['check_out_date'];
        $reservation->type = $_SESSION['type'];
        $reservation->status = "reserved";
        $reservation->save();
        $this->RoomModel->reserve($_SESSION['options'][$id]);
        if ($_SESSION['role']){
            Router::redirect("EmployeeDashboard");
        }else {
            Router::redirect("CustomerDashboard");
        }
    }

    public function monitorroomAction()
    {
        $roomDetails = $this->RoomModel->getRoomStatus();
        $this->view->roomDetails = $roomDetails;
        //        var_dump($roomDetails);
        $this->view->render('reservation/monitorroom');
    }


    public function roomrequestAction()
    {
        if (isset($_POST['filter_roomstatus'])){
            $room_reqs = $this->Room_reservationModel->getroom_reservations_bystatus($_POST['filter_roomstatus']);
        } else {
            $room_reqs = $this->Room_reservationModel->getallroom_reservations();
        }


        $this->view->allroom_reqs = $room_reqs;

        $this->view->render('management/roomreservation');


    }

    public function buffetrequestAction()
    {
        if (isset($_POST['filter_buffetstatus'])){
            $buffet_reqs = $this->Buffet_reservationModel->getBuffet_reservations_bystatus($_POST['filter_buffetstatus']);
        } else {
            $buffet_reqs = $this->Buffet_reservationModel->getallBuffet_reservations();
        }


        $this->view->allbuffet_reqs = $buffet_reqs;

        $this->view->render('management/buffetreservation');
    }

    public function changebuffetreservation_statusAction($id)
    {

        if ($_POST) {
            $this->Buffet_reservationModel->change_br_status($id, $_POST['buffet_res_status']);
        }


    }

    public function changeroomreservation_statusAction($id)
    {

        if ($_POST) {
            $this->Room_reservationModel->change_rr_status($id, $_POST['room_res_status']);
        }


    }


}
