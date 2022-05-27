<?php

class RoomStatus extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Room');
    }

    public function serviceAction() {
        if ($_POST) {
            $this->RoomModel->update($_POST['id'],[
                'last_service'=>date('Y-m-d H:i:s')
            ]);
            Router::redirect('EmployeeDashboard');
        } else {
            $this->view->roomDetails = $this->RoomModel->getRoomStatus();
            $this->view->render('room/service');
        }
    }

}