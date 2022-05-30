<?php

class Employee_assignment extends Model{

    public function __construct()
    {
        $table = 'employee_assignment';
        parent::__construct($table);
    }

    public function assignEmployee($params) {
        $params['is_closed'] = 0;
        $this->assign($params);
        $this->save();
    }

    public function findEmployee($req_id){
        $this->findFirst([
            "conditions"=>"customer_request_id=? and is_closed=?",
            "bind" => [$req_id,0]
        ]);
        return $this->employee_id;

    }
}


