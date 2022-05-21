<?php

    class EmployeeRegister extends Controller {

        public function __construct($controller,$action)
        {
            parent::__construct($controller,$action);
            $this->load_model('Employee');
        }

        public function loginAction(){
            Session::delete();
            if ($_POST){
                $this->EmployeeModel->findByUserName($_POST['username']);
                if ($this->EmployeeModel && password_verify(Input::get('password'),$this->EmployeeModel->password)){
                    $this->EmployeeModel->login();
                    Router::redirect('EmployeeDashboard');
                }else {
                    $this->view->message = "Check Your Username and Password";
                    $this->view->render('register/employeelogin');
                }
            }else {
                $this->view->render('register/employeelogin');
            }
        }

        public function logoutAction (){
            $user = Employee::currentLoggedInEmployee();
            $this->EmployeeModel->logout();
            Router::redirect('home/index');
        }

    }