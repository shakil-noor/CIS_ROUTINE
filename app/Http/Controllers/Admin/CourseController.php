<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['courses'] = Course::orderBy('id','desc')->paginate(5);
        return view('admin.courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.add');
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
            'title' => 'required',
            'short_name' => 'required',
            'course_code' => 'required|unique:courses',
            'course_type' => 'required',
            'credit' => 'required',
        ]);

        $data = $request->except('_token');
        Course::create($data);
        session()->flash('message','Course created successfully');
        return redirect()->route('course.index');
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
        $data['course'] = Course::findOrFail($id);
        return view('admin.courses.edit',$data);
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
            'title' => 'required',
            'short_name' => 'required|max:10',
            'course_code' => 'required|max:20',
            'course_type' => 'required',
            'credit' => 'required',
        ]);
        $data = $request->except('_token');

        $course = Course::findOrFail($id);
        $course->update($data);
        session()->flash('message','Course updated successfully');
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        session()->flash('message','Course delete successfully');
        return redirect()->back();
    }
}
