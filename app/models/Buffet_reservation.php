<?php 


class Buffet_reservation extends Model{

    public function __construct()
    {
        $table = 'buffet_reservation';
        parent::__construct($table);
    }

    public function reserve($params){
        $params['status'] = 'pending';
        $params['customer_id'] = Customer::currentLoggedInCustomer()->id;
        $params['is_closed'] = 0;
        $this->assign($params);
        $this->save();
    }


    //==============================================
    public function getallBuffet_reservations()
    {

        return $this->find([
            "conditions"=>"is_closed!=?",
            "bind" => ['1']
        ]);

    }

    public function change_br_status($id, $status)
    {

        //call update method

    }

}