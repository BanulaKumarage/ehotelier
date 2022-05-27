<?php


class Buffet_reservation extends Model
{

    public function __construct()
    {
        $table = 'buffet_reservation';
        parent::__construct($table);
    }

    public function reserve($params)
    {
        $params['status'] = 'pending';
        $params['customer_id'] = Customer::currentLoggedInCustomer()->id;
        $params['is_closed'] = 0;
        $this->assign($params);
        $this->save();
    }


    //==============================================
    public function getBuffet_reservations_bystatus($status)
    {

        if ($status == "all") {return $this->getallBuffet_reservations();}

        return $this->find([
            "conditions"=>"status=?",
            "bind" => [$status]
        ]);

    }


    public function getallBuffet_reservations()
    {

        return $this->find([
            "conditions" => "is_closed=?",
            "bind" => ['0']
        ]);

    }

    public function change_br_status($id, $status)
    {
        if ($status === "closed"){
            $this->update($id, [
                'is_closed' => 1]);
        }else {
            $this->update($id, [
                'status' => $status]);
        }

    }

}