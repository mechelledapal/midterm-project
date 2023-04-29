<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function dashboard()
    {
        $data = User::get();
        return view('dashboard', compact('data'));
    }
     public function addUser()
    {
        return view('add-user');
    }
    public function savedUser(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email' => 'required'
        ]);
        
        $name=$request->name;
        $email=$request->email;
        
        $stu=new User();
        $stu->name = $name;
        $stu->email = $email;
        $stu->save();
        return redirect()->back()->with('Success', 'User Added Successfully');
    }
    public function editUser($id)
    {
        $data= User::where('id','=', $id)->first();
        return view('edit-user', compact('data'));
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required'
        ]);
        
        $id=$request->id;
        $name=$request->name;
        $email=$request->email;

        User::where('id','=',$id)->update([
            'name' => $name,
            'email'=> $email
        ]);
        return redirect()->back()->with('Success', 'User Upadted Successfully');
    }

    public function deleteUser($id)
    {
        User::where('id','=',$id)->delete();
        return redirect()->back()->with('Success', 'User Deleted Successfully');
    }
}   
