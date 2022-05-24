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

}