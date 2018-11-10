<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\RoomsRepository;
use App\Repositories\CommentsRepository;

class SiteController extends Controller
{
    //

    protected $r_rep;
    protected $c_rep;

    protected $template;

    protected $vars;

    public function __construct(){

    }

    protected function renderOutput(){

        
        //$room = $this->getRoom($id);
        //$room = json_encode($room);
        //$this->vars = array_add($this->vars,'rooms',$room);
        //print_r('<pre>' . json_encode($room) . '</pre>');
        return view($this->template)->with($this->vars);
    }

    protected function getRoom($id) {

        $room = $this->r_rep->get($id);

        return $room;
    }
    
    protected function getComment($id) {

        $comment = $this->c_rep->get($id);

        return $comment;
    }
    
}
