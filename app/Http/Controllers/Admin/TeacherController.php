<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::orderBy('id','desc')->paginate(2);
        return view('admin.teachers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.add');
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
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:teachers',
            'username' => 'required|unique:teachers',
            'password' => 'required|min:6',
        ]);
        //store data into  data variable from request
        $data = $request->except('_token');
        $data['password'] = bcrypt('password');
        //insert or create new data into database
        Teacher::create($data);
        session()->flash('message','Teacher created successfully');
        return redirect()->route('teacher.index');
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
        $data['teacher'] = Teacher::findOrFail($id);
        return view('admin.teachers.edit',$data);
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
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique',
            'username' => 'required|max:30',
        ]);
        $data = $request->except('_token');

        //update data into database
        $teacher = Teacher::findOrFail($id);
        $teacher->update($data);
        session()->flash('message','Teacher updated successfully');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        session()->flash('message','Teacher deleted successfully');
        return redirect()->back();
    }
}
