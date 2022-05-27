<?php

class CustomerSearch extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Customer');
    }


    public function searchcustomerAction()
    {
        if ($_POST) {
            $customerinfo = $this->CustomerModel->findUser($_POST['customername']);
            //$this->view->customernames = $customerinfo;

        } else {
            $this->view->render('management/searchcustomer');
        }
    }

}