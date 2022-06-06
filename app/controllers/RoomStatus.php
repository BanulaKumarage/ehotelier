<?php

class RoomStatus extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Room');
    }

    public function serviceAction() {
        if ($_POST) {
            date_default_timezone_set('Asia/Colombo');
            $this->RoomModel->update($_POST['id'],[
                'last_service'=>date('Y-m-d H:i:s')
            ]);
            $_SESSION['message'] = "Room service status updated";
            Router::redirect('EmployeeDashboard');
        } else {
            $this->view->roomDetails = $this->RoomModel->getRoomStatus();
            $this->view->render('room/service');
        }
    }

    public function addRoomAction(){
        if ($_POST){
            date_default_timezone_set('Asia/Colombo');
            $_POST['last_service'] = date('Y-m-d H:i:s');
            $types = [
                'Suite'=>[4,35000],
                'Quad'=>[4,33000],
                'Deluxe'=>[4,25000],
                'Premium Deluxe'=>[4,30000],
                'Triple'=>[4,28000],
                'Single'=>[4,22000]
            ];
            $_POST['capacity'] = $types[$_POST['type']][0];
            $_POST['price'] = $types[$_POST['type']][1];
            $_POST['status'] = 'vacant';
            $this->RoomModel->addRoom($_POST);
            $_SESSION['message'] = "A new room added";
            Router::redirect("EmployeeDashboard");
        }else {
            $this->view->render('room/addroom');
        }
    }

}