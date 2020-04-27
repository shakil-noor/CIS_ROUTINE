<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rooms'] = Room::orderBy('id','desc')->paginate(10);
        return view('admin.rooms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'room_type' => 'required',
            'room_no' => 'required|max:10|unique:rooms',
            'capacity' => 'required|integer',
        ]);

        $data = $request->except('_token');
        //insert or create new data into database
        Room::create($data);
        session()->flash('message','Room created successfully');
        return redirect()->route('room.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['room'] = Room::findOrFail($id);
        return view('admin.rooms.edit',$data);
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
        //dd($request->all());
        $request->validate([
            'room_type' => 'required',
            'room_no' => 'required|max:10|unique:rooms,room_no,'.$id,
            'capacity' => 'required|integer',
        ]);
        $data = $request->except('_token');

        //update data into database
        $room = Room::findOrFail($id);
        $room->update($data);
        session()->flash('message','Room updated successfully');
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        session()->flash('message','Room deleted successfully');
        return redirect()->back();
    }
}
