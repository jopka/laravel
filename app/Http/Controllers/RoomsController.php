<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\RoomsRepository;
use App\Room;

class RoomsController extends SiteController
{
    public function __construct(RoomsRepository $r_rep){

        //parent::__construct(new \App\Repositories\RoomsRepository(new \App\Room),new \App\Repositories\CommentsRepository(new \App\Comment));

        $this->r_rep = $r_rep;
        $this->template = env('THEME').'.rooms';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        $room = $this->getRoom($id);
        $this->vars = array_add($this->vars,'rooms',$room);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->content = view(env('THEME').'.updateRoom')->render();
        return $this->content;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request = $request->except('_token');
        //($request['roomName']);
        return Room::create([
            'roomName' => $request['roomName'],
            'name' => $request['name'],
            'manager' => $request['manager'],
            'user' => $request['user'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $room = $this->getRoom($id);
        
        $this->vars = array_add($this->vars,'rooms',$room);

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd($id);
        
        $room = $this->getRoom($id);
        //$room = $room->except();
        
        //$room = json_encode($room);
        $this->content = view(env('THEME').'.updateRoom')->with(['id' =>$id])->render();
        //return redirect('/')->with($result);
        return $this->content;
        //$this->vars = array_add($this->vars,'id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($request);
        $request = $request->except('_token', '_method');
        //dd($request);
        return Room::where('id', $id)->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //dd($id);
        return Room::destroy($id);
    }
}
