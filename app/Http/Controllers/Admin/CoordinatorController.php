<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Coordinator;
use App\Model\Department;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coordinators'] = Coordinator::with('department')->orderBy('id','desc')->paginate(10);
        return view('admin.coordinators.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::all();
        return view('admin.coordinators.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:coordinators',
            'username' => 'required|unique:coordinators',
            'password' => 'required|min:6',
        ]);

        //store data into  data variable from request
        $data = $request->except('_token');
        $data['name'] = ucfirst($request->name);
        $data['password'] = bcrypt($request->password);

        //insert or create new data into database
        Coordinator::create($data);
        session()->flash('message','Coordinator created successfully');
        return redirect()->route('coordinator.index');
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
        $data['departments'] = Department::all();
        $data['coordinator'] = Coordinator::findOrFail($id) ;
        return view('admin.coordinators.edit',$data);
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
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:coordinators,email,'.$id,
            'username' => 'required|max:30|unique:coordinators,name'.$id,
        ]);
        $data = $request->except('_token');
        $data['name'] = ucfirst($request->name);

        //update data into database
        $teacher = Coordinator::findOrFail($id);
        $teacher->update($data);
        session()->flash('message','Coordinator updated successfully');
        return redirect()->route('coordinator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coordinator::destroy($id);
        session()->flash('message','Coordinator deleted successfully');
        return redirect()->back();
    }
}
