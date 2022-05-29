<?php 

class Home extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction(){
        $message = $_SESSION['message'] ?? "";
        Session::delete();
        $_SESSION['message'] = $message;
        $this->view->render('home/index');
    }

}