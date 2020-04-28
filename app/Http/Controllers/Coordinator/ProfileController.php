<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Model\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
       return view('coordinators.profile.index');
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
