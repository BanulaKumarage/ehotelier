<?php

    class CustomerRequestHandler extends Controller {

        public function __construct($controller,$action)
        {
            parent::__construct($controller,$action);
            $this->load_model('Customer_request');
        }

//        public function viewAction(){
//            $this->PharmacyModel = Pharmacy::currentLoggedInPharmacy();
//            $result = $this->PharmacyModel->findAllItems();
//            $this->view->items = $result;
//            $this->view->render('user/view_inventory');
//        }

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

        public function showRequestAction(){
            $customerRequests = $this->Customer_requestModel->getCustomerRequests();
            $this->view->customerRequests = $customerRequests;
            $this->view->render('request/showRequest');

        }
        public function updateRequestAction(){
            if ($_POST){
                $this->Customer_requestModel->updateRequest($_POST);
            }
            $this->showRequestAction();
        }
        
    }