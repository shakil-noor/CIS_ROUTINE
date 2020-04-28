<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Model\Coordinator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coordinators.profile.index');
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
        return view('coordinators.profile.edit');
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
            'email' => 'required|unique:coordinators,email,'.$id,
            'username' => 'required|unique:coordinators,username,'.$id,
        ]);

        $data = $request->except('_token');

        $batch = Coordinator::findOrFail($id);
        $batch->update($data);
        session()->flash('message','Your updated successfully');
        return redirect()->route('coordinatorProfile.index');

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
        return view('coordinators.profile.passwordEdit');
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
            $coordinator = Coordinator::findOrFail($id);
            $data['password'] = bcrypt($request->newPassword);
            $coordinator->update($data);
            session()->flash('message','Password updated successfully');
            return redirect()->route('coordinatorProfile.index');
        }else{
            session()->flash('errorMessage','Old password doesnt matched ');
            return redirect()->back();
        }
    }
}
