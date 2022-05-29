<?php 

class Room extends Model{

    public function __construct()
    {
        $table = 'room';
        parent::__construct($table);
    }

    public function getallrooms(){
        return $this->_db->find('room',[
            'conditions'=>'status=?',
            'bind'=>['vacant']
        ]);
    }

    public function getAllRoomOptions($options){
        $roomoptions = [];
        foreach ($options as $option) {
            $cond = '';
            $idArr = explode(",",$option);
            foreach($idArr as $id){
                if(is_numeric($id)){$cond .= 'id=' . $id . ' OR ';}
            }
            $cond = rtrim($cond, ' OR ');
            $rooms = $this->find(['conditions'=>$cond]);
            $roomoptions [] = $rooms;
        }
        return $roomoptions;

    }

    public function reserve($ids){
        $idlist = explode(",",$ids);

        foreach ($idlist as $id) {
            $this->_db->update('room',$id,[
                'status'=> 'occupied'
            ]);
        }
    }
    public function getRoomStatus(){
        $roomDetails = [];
        $roomDetails = $this->_db->find('room',[]);
        return $roomDetails;
    }


    public function closereservation($ids){
        $idlist = explode(",",$ids);
        foreach ($idlist as $id) {
            $room = new Room();
            $room->update($id,[
                'status'=>'vacant'
            ]);
        }
    }
}
