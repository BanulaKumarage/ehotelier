<?php


class Customer_request extends Model{

    public function __construct()
    {
        $table = 'customer_request';
        parent::__construct($table);
    }

    public function createRequest($params){
        $params['customer_id'] = Customer::currentLoggedInCustomer()->id;
        $params['status'] = 'pending';
        $params['timestamp'] = date('Y-m-d H:i:s');
        $this->assign($params);
        $this->save();
    }

    public function getCustomerRequests(){
        $customerRequests = [] ;
        $employee_id = Employee::currentLoggedInEmployee()->id;
        $arr = $this->_db->find('employee_assignment',[
            'conditions'=>'employee_id=? and is_closed=?',
            'bind'=>[$employee_id, 0]]);
//        var_dump($v[0]);
//        echo $v[0]->{"employee_id"};
        if ($arr){
            foreach ($arr as $i){
                $customerRequests [] =$this->_db->find('customer_request',[
                    'conditions'=>'id=?',
                    'bind'=>[$i->{"customer_request_id"}]]);
            }
        }

//        var_dump($customerRequests);
        return $customerRequests;
    }
    public function updateRequest($params){
        $employee_id = Employee::currentLoggedInEmployee()->id;
        $customer_req_id = $params['customer_req_id'];
        if ($params['requestStatus'] == "attended"){
            $this->_db->update('customer_request',$customer_req_id,[
                'status'=> 'attended'
            ]);
        }
        if ($params['requestStatus'] == "completed"){
            $this->_db->update('customer_request',$customer_req_id,[
                'status'=> 'completed'
            ]);
            $this->_db->query("UPDATE employee_assignment SET is_closed = ? WHERE customer_request_id = ?" , [1, $customer_req_id]);
        }


    }

    public function getPendingRequests(){
        return $this->_db->find('customer_request',[
            'conditions'=>'status=?',
            'bind'=>['pending']
        ]);
    }

}