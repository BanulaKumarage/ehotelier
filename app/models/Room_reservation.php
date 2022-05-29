<?php

class Room_reservation extends Model{

    public function __construct()
    {
        $table = 'room_reservation';
        parent::__construct($table);
    }

    public function getavailableoptions($arr,$allrooms){
        $types = ["Suite","Quad","Deluxe","Premium Deluxe"];
        $options = [];

        foreach ($types as $type) {
            $rooms = $this->_db->find('room',[
                "conditions"=>"status=? and type=?",
                "bind" => ["vacant",$type]
            ]);

            if ($rooms && count($rooms) >0){
                $noofrooms = ($arr['occupancy'] / $rooms[0]->capacity);
                if ($noofrooms <= count($rooms)){
                    $available_rooms = array_slice($rooms, 0, $noofrooms);
                    $ids = [];
                    foreach ($available_rooms as $room) {
                        $ids[] = $room->id;
                    }
                    $idlist = join(',',$ids);
                    if ($idlist !== ""){
                        $options[] = $idlist;
                    }      
                }
            }
        }
        return $options;
    }




    //==============================================
    public function getroom_reservations_bystatus($status)
    {
        if ($status == "all") {return $this->getallroom_reservations();}

        return $this->find([
            "conditions"=>"status=? and is_closed=?",
            "bind" => [$status,0],
        ]);

    }

    public function getallroom_reservations()
    {

        return $this->find([
            "conditions"=>"id>? and is_closed=?",
            "bind" => [0,0]
        ]);

    }

    public function change_rr_status($id, $status)
    {
        $this->update($id, [
            'status' => $status]);
        $this->update($id,[
            'is_closed'=>1
        ]);
    }
}