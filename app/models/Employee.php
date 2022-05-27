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
        $this->findFirst(['conditions' => 'username=? and is_closed=?', 'bind' => [$username,0]]);
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
    public function registerNewEmployee($params){
        $params['is_closed'] = 0;
        $params['status'] = "available";
        var_dump($params);
        $this->assign($params);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }
    public function removeEmployee($params){
        if ($params['email']){
            $this->_db->query("UPDATE employee SET is_closed = ? WHERE email = ?" , [1, $params['email']]);
        }
    }

    public function logout()
    {
        Session::delete();
        self::$currentLoggedInEmployee = null;
        return true;
    }

    public function getWorkerEmployees() {
        return $this->_db->find('employee',[
            'conditions'=>'role=?',
            'bind'=>['worker']
        ]);
    }



}