<?php

    class CustomerRequestHandler extends Controller {

        public function __construct($controller,$action)
        {
            parent::__construct($controller,$action);
            $this->load_model('Customer_request');
        }

        public function createAction(){
            $validation = new Validate();
            if ($_POST){
                $validation->check($_POST,[
                    'reservation_id'=>[
                        'display'=>'Room Reservation id',
                        'valid_reservationid'=>true
                    ]
                ]);
                if ($validation->passed()){
                    $this->Customer_requestModel->createRequest($_POST);
                    Router::redirect('CustomerDashboard');
                }else {
                    $this->view->errors = $validation->displayErrors();
                    $this->view->render('request/create');
                }
            }else {
                $this->view->render('request/create');
            }
        }
        
    }