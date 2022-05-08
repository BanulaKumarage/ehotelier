<?php

class Customer extends Model{

    public function __construct()
    {
        $table = 'customer';
        parent::__construct($table);
    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=?', 'bind' => [$username]]);
    }

    public function login(){
        Session::set($this->_sessionName,$this->id);
        Session::set('username',$this->username);
        Session::set('customername',$this->name);
    }
}