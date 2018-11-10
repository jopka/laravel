<?php

namespace App\Repositories;

use App\Room;

class RoomsRepository extends Repository{

    public function __construct(Room $room){

        $this->model = $room;
    
    }
    public function updateRoom($request, $id){
        $this->model
                    ->where('id', $id)
                    ->update($request);
    }
    public function deleteRoom($id){
        $this->model
                    ->where('id', $id)
                    ->delete();
    }
    public function addRoom($request){
        $request->rooms()->save();
    }
}

?>