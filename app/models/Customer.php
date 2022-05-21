<?php

class Customer extends Model{

    public static $currentLoggedInCustomer = null;

    public function __construct()
    {
        $table = 'customer';
        parent::__construct($table);
    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=?', 'bind' => [$username]]);
    }

    public static function currentLoggedInCustomer()
    {
        $user = new Customer();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInCustomer = $user;
        return self::$currentLoggedInCustomer;
    }

    public function login(){
        Session::set($this->_sessionName,$this->id);
        Session::set('username',$this->username);
        Session::set('customername',$this->name);
    }

    public function logout()
    {
        Session::delete();
        self::$currentLoggedInCustomer = null;
        return true;
    }
}