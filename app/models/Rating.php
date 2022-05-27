<?php

class Rating extends Model{

    public function __construct()
    {
        $table = 'rating';
        parent::__construct($table);
    }

    public function rate($params){
        $params['customer_id'] = Customer::currentLoggedInCustomer()->id;
        $this->assign($params);
        $this->save();
    }

    public function getRatings(){
        return $this->_db->find('rating',[]);
    }

}