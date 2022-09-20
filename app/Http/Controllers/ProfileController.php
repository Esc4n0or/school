<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function change_password(){

        return view('profile.change_password');
    }

    public function update_password(Request $request){
        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);

        $current_user = auth()->user();
        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>Hash::make($request->new_password)
                
            ]);

            return redirect()->back()->with('success', 'Password Successfuly Updated'); 

        }else {

            return redirect()->back()->with('error', 'old password does not matched');
        }
    }
}
