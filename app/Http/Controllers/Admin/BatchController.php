<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Batch;
use App\Model\Department;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['batches'] = Batch::orderBy('id','ASC')->paginate(5);
        return view('admin.batches.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::orderBy('id','ASC')->get();
        return view('admin.batches.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|unique:batches',
            'num_of_std' => 'required|integer',
            'department_id' => 'required|integer',
        ]);

        $data = $request->except('_token');
        //dd($data);
        Batch::create($data);
        session()->flash('message','Batch created successfully');
        return redirect()->route('batch.index');
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
        $data['departments'] = Department::orderBy('id','ASC')->get();
        $data['batch'] = Batch::findOrFail($id);
        return view('admin.batches.edit',$data);
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
            'name' => 'required|unique:batches,name,'.$id,
            'num_of_std' => 'required|integer',
            'department_id' => 'required|integer',
        ]);

        $data = $request->except('_token');

        $batch = Batch::findOrFail($id);
        $batch->update($data);
        session()->flash('message','Batch updated successfully');
        return redirect()->route('batch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Batch::destroy($id);
        session()->flash('message','Batch deleted successfully');
        return redirect()->back();
    }
}
