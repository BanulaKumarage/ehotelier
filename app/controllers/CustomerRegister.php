<?php

    class CustomerRegister extends Controller {

        public function __construct($controller,$action)
        {
            parent::__construct($controller,$action);
            $this->load_model('Customer');
        }

        public function loginAction(){
            if ($_POST){
                $this->CustomerModel->findByUserName($_POST['username']);
                if ($this->CustomerModel && password_verify(Input::get('password'),$this->CustomerModel->password)){
                    $this->CustomerModel->login();
                    Router::redirect('/CustomerDashboard');
                }else {
                    $this->view->message = "Check Your Username and Password";
                    $this->view->render('register/login');
                }
            }else {
                $this->view->render('register/login');
            }
        }

    }