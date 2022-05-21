<?php

class Employee extends Model{

    public static $currentLoggedInEmployee = null;

    public function __construct()
    {
        $table = 'employee';
        parent::__construct($table);
    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=?', 'bind' => [$username]]);
    }

    public static function currentLoggedInEmployee()
    {
        $user = new Employee();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInEmployee = $user;
        return self::$currentLoggedInEmployee;
    }

    public function login(){
        Session::set($this->_sessionName,$this->id);
        Session::set('username',$this->username);
        Session::set('employeename',$this->name);
        Session::set('role',$this->role);
    }

    public function logout()
    {
        Session::delete();
        self::$currentLoggedInEmployee = null;
        return true;
    }

}