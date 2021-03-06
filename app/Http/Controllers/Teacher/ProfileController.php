<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Model\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('teachers.profile.edit');
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
        //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers,email,'.$id,
            'username' => 'required|unique:teachers,username,'.$id,
        ]);

        $data = $request->except('_token');

        $T = Teacher::findOrFail($id);
        $T->update($data);
        session()->flash('message','Your Profile updated successfully');
        return redirect()->route('teacherProfile.index');
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
    }

    public function passwordEdit(){
    return view('teachers.profile.passwordEdit');
    }

    public function passwordUpdate(Request $request, $id){
    //dd($request->all());
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $oldPassword = auth()->user()->password;

        if (Hash::check($request->oldPassword , $oldPassword )) {
            //dd('ok');
            $teacher = Teacher::findOrFail($id);
            $data['password'] = bcrypt($request->newPassword);
            $teacher->update($data);
            session()->flash('message','Password updated successfully');
            return redirect()->route('teacherProfile.index');
        }else{
            session()->flash('errorMessage','old password doesnt matched ');
            return redirect()->back();
        }
    }
}
