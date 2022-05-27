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
        public function addEmployeeAction(){

            $validation = new Validate();
            if ($_POST){

                $validation->check($_POST,[
                    'password'=>[
                        'display'=>'Password',
                        'min'=>6
                    ],
                    'username'=>[
                        'display'=>'Username',
                        'min'=>4
                    ],
                    'repassword'=>[
                        'display'=>'Confirm Password',
                        'matches'=>'password'
                    ],
                    'username'=>[
                        'display'=>'Username',
                        'unique'=>'customer'
                    ],
                    'contact_no'=>[
                        'display'=>'Mobile Number',
                        'valid_contact'=>true
                    ],
                    'email'=>[
                        'display'=>'Email',
                        'valid_email'=>true
                    ]
                ]);

                if ($validation->passed()){
                    $this->EmployeeModel = new Employee();
                    $this->EmployeeModel->registerNewEmployee($_POST);
                    Router::redirect('');
                }else {
                    $this->view->displayErrors = $validation->displayErrors();
                    $this->view->render('register/addemployee');
                }
            }else{
                $this->view->render('register/addemployee');
            }
        }
        public function removeEmployeeAction(){
            $validation = new Validate();
            if ($_POST){
                $validation->check($_POST,[
                    'email'=>[
                        'display'=>'Email',
                        'valid_email'=>true
                    ]
                ]);
                if ($validation->passed()){
                    $this->EmployeeModel = new Employee();
                    $this->EmployeeModel->removeEmployee($_POST);
                    $this->view->render('register/addemployee');
                }else {
                    $this->view->displayErrors = $validation->displayErrors();
                    $this->view->render('register/addemployee');
                }
            }else{
                $this->view->render('register/addemployee');
            }


        }
    }