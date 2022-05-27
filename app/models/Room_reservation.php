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

            $noofrooms = ($arr['occupancy'] / $rooms[0]->capacity);
            if ($noofrooms <= count($rooms)){
                $available_rooms = array_slice($rooms, 0, $noofrooms);
                $ids = [];
                foreach ($available_rooms as $room) {
                    $ids[] = $room->id;
                }
                $options[] = join(',',$ids);
            }
        }
        return $options;
    }




    //==============================================
    public function getallroom_reservations()
    {

        return $this->find([
            "conditions"=>"status!=?",
            "bind" => ['closed']
        ]);

    }

    public function change_rr_status($id, $status)
    {

        //call update method

    }
}