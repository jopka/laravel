<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CommentsRepository;
use App\Comment;

class CommentsController extends SiteController
{
    public function __construct(CommentsRepository $c_rep){

        //parent::__construct(new \App\Repositories\RoomsRepository(new \App\Room),new \App\Repositories\CommentsRepository(new \App\Comment));

        $this->c_rep = $c_rep;

        $this->template = env('THEME').'.comments';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        //

        $comment = $this->getComment($id);
        $this->vars = array_add($this->vars,'comments',$comment);
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
        $this->content = view(env('THEME').'.updateСomment')->render();
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

        return Comment::create([
            'name' => $request['name'],
            'text' => $request['text'],
            'room_id' => $request['room_id'],
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
        $comment = $this->getComment($id);
        $this->vars = array_add($this->vars,'comments',$comment);
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
        $сomment = $this->getComment($id); 
        $this->content = view(env('THEME').'.updateComment')->with(['id' =>$id])->render();
        //return redirect('/')->with($result);
        return $this->content;
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
        return Comment::where('id', $id)->update($request);
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
        return Comment::destroy($id);
    }
}
